<style>
    .order-form_body-search {
        background: #eee;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .order-form_body-search button{
        background: #eee;
        width: 50px;
        height: 50px;
        font-size: 1.7em;
        font-weight: 600;
        cursor: pointer;
        border: none;
        outline: none;
        box-shadow: -6px -6px 12px rgba(255,255,255,.8),
        -6px -6px 8px rgba(255,255,255,.5),
        inset 6px 6px 4px rgba(255,255,255,.1),
        6px 6px 8px rgba(0,0,0,.15);

        transition: .4s ease;
        border-radius: 40px;
    }

    .order-form_body-search button:active{
        box-shadow: inset -6px -6px 12px rgba(255,255,255,.8),
        inset   -6px -6px 8px rgba(255,255,255,.5),
        inset 6px 6px 4px rgba(255,255,255,.1),
        inset 6px 6px 8px rgba(0,0,0,.15);
    }
</style>
<div class="search-body js-search">
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="modalSearchLabel">Search equipment</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <input type="text" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <h5 class="label-search">Categories</h5>--}}
{{--                            <div class="control-group">--}}
{{--                                <label class="control control-checkbox">--}}
{{--                                    Chocolate--}}
{{--                                    <input type="checkbox" checked="checked" />--}}
{{--                                    <span class="control_indicator"></span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="button-neu">Search</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="search-categories">
        @foreach($categories as $category)
            <div class="order-form_success js-order-form_success hide">
                <div class="order-form">
                    <h3 class="order-form_title">
                        <span class="equipment-title order-form_title-text">Search</span>
                    </h3>
                    <div class="order-form_body order-form_body-search">
                        <button>Button</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('js')
    <script>
        $('.js-show-search').on('click', function () {
            $('.js-search').addClass('search-body-active');
        });
    </script>
@endpush
