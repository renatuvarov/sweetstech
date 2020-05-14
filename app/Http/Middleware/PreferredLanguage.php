<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PreferredLanguage
{
    private $languages = ['ru', 'uk', 'be', 'hy', 'az', 'ky', 'tg', 'uz'];
    /**
     * @var Request
     */
    private $request;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $prefix;
    /**
     * @var string|null
     */
    private $routeName;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->prefix = config('site.user.routes.prefix.name');
        $this->routeName = $request->route()->getName();
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( ! $this->sessionHasLanguage()) {
            return $this->isCis() ? $this->redirect('ru') : $this->redirect('en');
        }

        if ($this->isEn() && $this->getLanguageFromSession() === 'ru') {
            return $this->queryHasLanguage() ? $this->redirect('en') : $this->redirect('ru');
        } elseif ( ! $this->isEn() && $this->getLanguageFromSession() === 'en') {
            return $this->queryHasLanguage() ? $this->redirect('ru') : $this->redirect('en');
        }

        return $next($request);
    }

    private function isCis(): bool
    {
        $language = mb_strtolower(substr($this->request->getPreferredLanguage(), 0, 2));

        return in_array($language, $this->languages);
    }

    private function queryHasLanguage(): bool
    {
        return $this->request->query->has('lang');
    }

    private function sessionHasLanguage(): bool
    {
        return $this->request->session()->has('st_language');
    }

    private function putLanguageToSession(string $language): void
    {
        $this->request->session()->put('st_language', $language);
    }

    private function getLanguageFromSession(): string
    {
        return $this->request->session()->get('st_language');
    }

    private function isEn(): bool
    {
        return $this->prefix !== substr($this->routeName, 0, strlen($this->prefix));
    }

    private function redirect(string $language): RedirectResponse
    {
        $part = preg_replace('~^ru/?~', '', $this->request->path() . $this->removeLangParam());

        if ($language === 'ru') {
            $this->putLanguageToSession('ru');
            return redirect('ru/' . $part);
        }
        $this->putLanguageToSession('en');
        return redirect($part);
    }

    private function removeLangParam(): string
    {
        $query = $this->request->query();
        unset($query['lang']);
        return $query ? '?' . http_build_query($query) : '';
    }
}
