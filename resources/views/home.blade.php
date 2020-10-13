        @include('header')
            
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <style type="text/css">
            .left-side-bg {
                 background-position: center; 
                 background-size: 80%; 
                 background-color: #453939;
                 background-repeat: no-repeat;
            }

            #submit-btn:hover {
                background-color: #453939;
                border-color: #453939;
            }

            select.form-control:not([size]):not([multiple]) {
                height: auto;
            }

            @media (max-width: 768px) {
                .left-side-bg {
                     background-position: center; 
                     background-size: 50%; 
                     background-color: #453939;
                     background-repeat: no-repeat;
                     height: 60vw;
                }
            }

              input[type="date"]:before {
                content: attr(placeholder) !important;
                color: #aaa;
                margin-right: 0.5em;
              }
              input[type="date"]:focus:before,
              input[type="date"]:valid:before {
                content: "";
              }
        </style>
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-login m-login--singin  m-login--5" id="m_login" >
                <div class="m-login__wrapper-2 m-portlet-full-height">
                    <div class="m-login__contanier">
                        <div class="m-login__signin">

                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    <b>E-PERMIT</b><br>HRD GBI Sukawarna
                                </h3>
                            </div>
                            <form class="m-login__form m-form" action="{{ route('permit') }}" method="POST">
                                @csrf
                                <div class="form-group m-form__group">
                                    <select class="form-control" name="dept" id="dept">
                                        <option value="" disabled selected>DEPARTMENT</option>
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <select class="form-control" name="subdiv" id="subdiv">
                                        <option value="" disabled selected>SUB-DIVISI</option>
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <select class="form-control" name="unit" id="unit">
                                        <option value="" disabled selected>UNIT</option>
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <select class="form-control" name="type" id="type">
                                        <option value="" disabled selected>TYPE</option>
                                    </select>
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Name" name="name" required>
                                    <input class="form-control m-input" type="hidden" name="id">
                                    <div class="name-dropdown">
                                        <div class="lds-facebook hide"><div></div><div></div><div></div></div>
                                        <ul style="list-style-type: none; padding-left: 0px; text-align: left; display: none">
                                            <li class="mt-list-item">
                                                <div class="list-item-content">
                                                    <a href="javascript:;">
                                                        <div class="name-dropdown-content">
                                                            Concept Proof
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="mt-list-item">
                                                <div class="list-item-content">
                                                    <a href="javascript:;">
                                                        <div class="name-dropdown-content">
                                                            Listings Feature
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" name="dnh" id="dnh" required placeholder="Date & Hour">
                                </div>
                                <div class="form-group m-form__group">
                                    <textarea class="form-control m-input" rows="5" placeholder="Details" name="details" required></textarea>
                                </div>
                                <div class="m-login__form-action">
                                    <button type ="submit" id="submit-btn" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" style="font-weight: 400">
                                        SUBMIT
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Page -->
        @include('footer')
    </body>
</html>
            
        