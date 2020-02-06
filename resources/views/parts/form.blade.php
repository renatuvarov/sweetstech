<div class="contacts-form_wrapper js-contacts-form_wrapper">
    <form action="{{route('mmc-200.ajax')}}" class="form" method="post" enctype="multipart/form-data">
        <h3 class="form-title">MMC-200</h3>
        @csrf
        <div class="input_wrapper">
            <label for="nsp" class="form-label js-form-label">ФИО</label>
            <input type="text" id="nsp" name="nsp" class="form-input js-form-input">
        </div>
        <div class="input_wrapper">
            <label for="company" class="form-label js-form-label">Компания</label>
            <input type="text" id="company" name="company" class="form-input js-form-input">
        </div>
        <div class="input_wrapper">
            <label for="email" class="form-label js-form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-input js-form-input">
        </div>
        <div class="input_wrapper phone_wrapper">
            <label for="phone" class="form-label js-form-label">Телефон</label>
            <input type="tel" id="phone" name="phone" class="form-input js-form-input">
        </div>
        <input type="hidden" name="product" value="mmc-200">
        <p class="form-info">* - обязательное поле</p>
        <p class="form-info">
            <input type="checkbox" class="form-accept js-form-accept" checked="checked" id="accept" style="cursor:pointer;">
            <label style="cursor:pointer;" for="accept">Согласен на обработку персональных данных</label>
        </p>
        <div class="form-btn_wrapper">
            <button type="submit" class="form-btn js-form-btn">
                <span class="js-form-btn_txt">Заказать!</span>
                <div class="spinner js-spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </button>
        </div>
        <button class="form-close js-form-close form-close-inner" type="button">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <g>
        <path d="M256,0C114.508,0,0,114.497,0,256c0,141.493,114.497,256,256,256c141.492,0,256-114.497,256-256
			C512,114.507,397.503,0,256,0z M256,472c-119.384,0-216-96.607-216-216c0-119.385,96.607-216,216-216
			c119.384,0,216,96.607,216,216C472,375.385,375.393,472,256,472z"/>
    </g>
</g>
                <g>
                    <g>
                        <path d="M343.586,315.302L284.284,256l59.302-59.302c7.81-7.81,7.811-20.473,0.001-28.284c-7.812-7.811-20.475-7.81-28.284,0
			L256,227.716l-59.303-59.302c-7.809-7.811-20.474-7.811-28.284,0c-7.81,7.811-7.81,20.474,0.001,28.284L227.716,256
			l-59.302,59.302c-7.811,7.811-7.812,20.474-0.001,28.284c7.813,7.812,20.476,7.809,28.284,0L256,284.284l59.303,59.302
			c7.808,7.81,20.473,7.811,28.284,0C351.398,335.775,351.397,323.112,343.586,315.302z"/>
                    </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
</svg>
        </button>
    </form>
    <button class="form-close js-form-close form-close-outer" type="button">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <g>
        <path d="M256,0C114.508,0,0,114.497,0,256c0,141.493,114.497,256,256,256c141.492,0,256-114.497,256-256
			C512,114.507,397.503,0,256,0z M256,472c-119.384,0-216-96.607-216-216c0-119.385,96.607-216,216-216
			c119.384,0,216,96.607,216,216C472,375.385,375.393,472,256,472z"/>
    </g>
</g>
            <g>
                <g>
                    <path d="M343.586,315.302L284.284,256l59.302-59.302c7.81-7.81,7.811-20.473,0.001-28.284c-7.812-7.811-20.475-7.81-28.284,0
			L256,227.716l-59.303-59.302c-7.809-7.811-20.474-7.811-28.284,0c-7.81,7.811-7.81,20.474,0.001,28.284L227.716,256
			l-59.302,59.302c-7.811,7.811-7.812,20.474-0.001,28.284c7.813,7.812,20.476,7.809,28.284,0L256,284.284l59.303,59.302
			c7.808,7.81,20.473,7.811,28.284,0C351.398,335.775,351.397,323.112,343.586,315.302z"/>
                </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
</svg>
    </button>
</div>
<button type="button" class="show-form js-show-form">Заказать</button>
