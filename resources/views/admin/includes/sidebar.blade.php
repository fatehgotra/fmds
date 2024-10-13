<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo-sm.png" alt="" height="40">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <svg height="20" viewBox="0 0 512 512" width="19" xmlns="http://www.w3.org/2000/svg">
                        <g fill="currentColor">
                            <path
                                d="m197.332031 170.667969h-160c-20.585937 0-37.332031-16.746094-37.332031-37.335938v-96c0-20.585937 16.746094-37.332031 37.332031-37.332031h160c20.589844 0 37.335938 16.746094 37.335938 37.332031v96c0 20.589844-16.746094 37.335938-37.335938 37.335938zm-160-138.667969c-2.941406 0-5.332031 2.390625-5.332031 5.332031v96c0 2.945313 2.390625 5.335938 5.332031 5.335938h160c2.945313 0 5.335938-2.390625 5.335938-5.335938v-96c0-2.941406-2.390625-5.332031-5.335938-5.332031zm0 0" />
                            <path
                                d="m197.332031 512h-160c-20.585937 0-37.332031-16.746094-37.332031-37.332031v-224c0-20.589844 16.746094-37.335938 37.332031-37.335938h160c20.589844 0 37.335938 16.746094 37.335938 37.335938v224c0 20.585937-16.746094 37.332031-37.335938 37.332031zm-160-266.667969c-2.941406 0-5.332031 2.390625-5.332031 5.335938v224c0 2.941406 2.390625 5.332031 5.332031 5.332031h160c2.945313 0 5.335938-2.390625 5.335938-5.332031v-224c0-2.945313-2.390625-5.335938-5.335938-5.335938zm0 0" />
                            <path
                                d="m474.667969 512h-160c-20.589844 0-37.335938-16.746094-37.335938-37.332031v-96c0-20.589844 16.746094-37.335938 37.335938-37.335938h160c20.585937 0 37.332031 16.746094 37.332031 37.335938v96c0 20.585937-16.746094 37.332031-37.332031 37.332031zm-160-138.667969c-2.945313 0-5.335938 2.390625-5.335938 5.335938v96c0 2.941406 2.390625 5.332031 5.335938 5.332031h160c2.941406 0 5.332031-2.390625 5.332031-5.332031v-96c0-2.945313-2.390625-5.335938-5.332031-5.335938zm0 0" />
                            <path
                                d="m474.667969 298.667969h-160c-20.589844 0-37.335938-16.746094-37.335938-37.335938v-224c0-20.585937 16.746094-37.332031 37.335938-37.332031h160c20.585937 0 37.332031 16.746094 37.332031 37.332031v224c0 20.589844-16.746094 37.335938-37.332031 37.335938zm-160-266.667969c-2.945313 0-5.335938 2.390625-5.335938 5.332031v224c0 2.945313 2.390625 5.335938 5.335938 5.335938h160c2.941406 0 5.332031-2.390625 5.332031-5.335938v-224c0-2.941406-2.390625-5.332031-5.332031-5.332031zm0 0" />
                        </g>
                    </svg>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.user.index') }}" class="side-nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479a3 3 0 0 0-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72a8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0a3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0a2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0a2.25 2.25 0 0 1 4.5 0Z"/>
                    </svg>
                    <span> Users </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                <svg fill="none" height="22" viewBox="0 0 24 24" width="23"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-rule="evenodd" fill="currentColor" fill-rule="evenodd">
                            <path
                                d="m3.53033 4.53033c-.51149.51149-.78033 1.46431-.78033 3.46967v8c0 2.0054.26884 2.9582.78033 3.4697s1.46431.7803 3.46967.7803h10c2.0054 0 2.9582-.2688 3.4697-.7803s.7803-1.4643.7803-3.4697v-8c0-2.00536-.2688-2.95818-.7803-3.46967s-1.4643-.78033-3.4697-.78033h-10c-2.00536 0-2.95818.26884-3.46967.78033zm-1.06066-1.06066c.98851-.98851 2.53569-1.21967 4.53033-1.21967h10c1.9946 0 3.5418.23116 4.5303 1.21967s1.2197 2.53569 1.2197 4.53033v8c0 1.9946-.2312 3.5418-1.2197 4.5303s-2.5357 1.2197-4.5303 1.2197h-10c-1.99464 0-3.54182-.2312-4.53033-1.2197s-1.21967-2.5357-1.21967-4.5303v-8c0-1.99464.23116-3.54182 1.21967-4.53033z" />
                            <path
                                d="m13.25 8c0-.41421.3358-.75.75-.75h5c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-5c-.4142 0-.75-.33579-.75-.75z" />
                            <path
                                d="m14.25 12c0-.4142.3358-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.4142 0-.75-.3358-.75-.75z" />
                            <path
                                d="m16.25 16c0-.4142.3358-.75.75-.75h2c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.3358-.75-.75z" />
                            <path
                                d="m8.49994 8.41992c-.58542 0-1.06.47458-1.06 1.06 0 .58538.47458 1.05998 1.06 1.05998s1.06-.4746 1.06-1.05998c0-.58542-.47458-1.06-1.06-1.06zm-2.56 1.06c0-1.41385 1.14615-2.56 2.56-2.56s2.55996 1.14615 2.55996 2.56c0 1.41388-1.14611 2.55998-2.55996 2.55998s-2.56-1.1461-2.56-2.55998z" />
                            <path
                                d="m9.33097 12.8631c1.80693.1639 3.24103 1.5862 3.41563 3.3946.0398.4123-.2622.7788-.6745.8186s-.7788-.2622-.8186-.6745c-.1052-1.0902-.9692-1.9472-2.06042-2.045l-.00766-.0007.00001-.0001c-.44989-.0449-.91038-.0451-1.3722.0002l-.0011.0001c-1.09946.1061-1.96068.9594-2.06555 2.0455-.03981.4123-.40631.7143-.81861.6745-.41229-.0398-.71425-.4063-.67445-.8186.17512-1.8137 1.61362-3.2203 3.4139-3.3944.55675-.0546 1.11482-.0548 1.66355-.0002z" />
                        </g>
                    </svg>
                    <span> Applications </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                <svg fill="none" height="22" viewBox="0 0 40 40" width="22" xmlns="http://www.w3.org/2000/svg">
                            <g clip-rule="evenodd" fill="currentColor" fill-rule="evenodd">
                                <path d="m6.32764 19.6443c-.05522.0552-.07764.1185-.07764.1724v5.5c0 .9596.79035 1.75 1.74998 1.75h2.16662c.143 0 .2501-.1071.2501-.25v-7c0-.1353-.1161-.25-.2501-.25h-3.66656c-.05392 0-.11719.0224-.1724.0776zm-2.57764.1724c0-1.5071 1.24307-2.75 2.75004-2.75h3.66656c1.5327 0 2.7501 1.2519 2.7501 2.75v7c0 1.5237-1.2264 2.75-2.7501 2.75h-2.16662c-2.34037 0-4.24998-1.9097-4.24998-4.25z"></path>
                                <path d="m20 6.23334c-5.7596 0-10.41667 4.65706-10.41667 10.41666v1.6833c0 .6904-.55964 1.25-1.25 1.25-.69035 0-1.25-.5596-1.25-1.25v-1.6833c0-7.14035 5.77627-12.91666 12.91667-12.91666s12.9167 5.77631 12.9167 12.91666v1.6667c0 .6903-.5597 1.25-1.25 1.25-.6904 0-1.25-.5597-1.25-1.25v-1.6667c0-5.7596-4.6571-10.41666-10.4167-10.41666z"></path>
                                <path d="m31.7462 27.0912c.6769.1359 1.1153.7948.9794 1.4716-.8817 4.3892-4.7521 7.6872-9.3923 7.6872h-1.6666c-.6904 0-1.25-.5596-1.25-1.25s.5596-1.25 1.25-1.25h1.6666c3.4265 0 6.2896-2.4354 6.9412-5.6795.136-.6768.7949-1.1153 1.4717-.9793z"></path>
                                <path d="m29.661 19.6443c-.0552.0552-.0777.1185-.0777.1724v7c0 .1353.1161.25.2501.25h2.0833c1.0096 0 1.8333-.8237 1.8333-1.8334v-5.4166c0-.1353-.116-.25-.25-.25h-3.6666c-.0539 0-.1172.0224-.1724.0776zm-2.5777.1724c0-1.5071 1.2431-2.75 2.7501-2.75h3.6666c1.5326 0 2.75 1.2519 2.75 2.75v5.4166c0 2.3904-1.9429 4.3334-4.3333 4.3334h-2.0833c-1.5327 0-2.7501-1.252-2.7501-2.75z"></path>
                            </g>
                        </svg>
                    <span> Departments </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.tickets.index') }}" class="side-nav-link">
                    <svg id="svg1840" height="20" viewBox="0 0 16.933333 16.933334" width="20" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                        <g id="layer1" transform="translate(0 -280.067)" fill="currentColor">
                            <path id="path2628" d="m10.737827 280.92396c-.723378-.19807-1.4641878-.30851-2.2308736-.30851-.7711995 0-1.5161313.11176-2.2520566.30929l-3.5971983-.32841c-1.1806715-.00051-2.23622668.94899-2.12751733 2.14044l.32194236 3.48687c-.22418146.77814-.34881609 1.57165-.34881609 2.39391 0 .80422.12032986 1.58004.34080715 2.31898l-.314452 3.57291c-.00052917 1.1804.94857621 2.23532 2.13992101 2.12726l3.5971983-.32789c.7265908.19945 1.4702869.31032 2.2401715.31032.7736073 0 1.5209966-.11156 2.2644606-.30851l3.583762.32659c1.180624.00053 2.232528-.94855 2.12752-2.1394l-.313936-3.54423c.219305-.75233.340289-1.52993.340289-2.33603 0-.81871-.124069-1.60878-.347522-2.38409l.321169-3.49721c.000794-.008.0011-.0158.0011-.0238 0-1.09573-.84205-2.08974-2.030368-2.11873zm3.722251.19896c.877771.0251 1.491854.76079 1.493968 1.58543l-.224277 2.46393c-.80359-1.68012-2.176931-3.03514-3.868497-3.81837zm-11.8183975.003 2.5130232.22738c-1.6921744.78276-3.0666664 2.13748-3.8710818 3.81733l-.2263431-2.48243c-.0776288-.8508.7028286-1.56041 1.5844017-1.5627zm5.8652729.0176c1.4624553 0 2.8250516.42023 3.9765026 1.14515l-2.267562 2.25361c-.5258694-.22138-1.1032696-.34416-1.7089406-.34416-.6062451 0-1.1840369.1229-1.7104889.34468l-2.2665293-2.25361c1.1518185-.72501 2.514465-1.14567 3.9770182-1.14567zm4.4219526 1.44797c.623689.45845 1.172972 1.01161 1.627809 1.63815l-2.214854 2.20141c-.388485-.67933-.951566-1.24479-1.628322-1.63711zm-8.8449366.00052 2.2153668 2.20245c-.6771137.39249-1.2401576.95805-1.6288411 1.63763l-2.2143351-2.20239c.4549326-.62648 1.0040568-1.1797 1.6278094-1.63814zm-1.9290825 2.08463 2.2675613 2.25516c-.2153603.51991-.3353779 1.08928-.3353779 1.6862 0 .59697.1205018 1.1654.3358965 1.68517l-2.2685958 2.25412c-.7105492-1.14399-1.1218969-2.49307-1.1218969-3.93974 0-1.44711.4114615-2.79729 1.1224128-3.94136zm12.7025851 0c.710732 1.14412 1.12241 2.49415 1.12241 3.94136 0 1.44692-.411424 2.79614-1.121894 3.93981l-2.26808-2.25464c.215175-.51973.334865-1.08826.334865-1.68517 0-.59732-.11992-1.16704-.335381-1.68724zm-6.3505186.0506c2.1514536 0 3.8886526 1.73927 3.8886526 3.89072s-1.737199 3.88865-3.8886526 3.88865c-2.1514488 0-3.8907165-1.7372-3.8907165-3.88865s1.7392677-3.89072 3.8907165-3.89072zm-3.8364583 6.07612c.3889084.67966.9522433 1.24489 1.6298756 1.63711l-2.2158854 2.20203c-.6243796-.45861-1.1741203-1.01169-1.6293572-1.63865zm7.6718849 0 2.214851 2.20141c-.454965.62673-1.004329 1.17967-1.628325 1.63814l-2.215367-2.20244c.677164-.39222 1.240303-.95758 1.628841-1.63711zm3.393075 1.24695.220141 2.49442c.07514.85211-.703093 1.56172-1.584918 1.56373l-2.510956-.22583c1.696598-.78509 3.07273-2.14577 3.875733-3.83232zm-14.4585509.00053c.80282 1.68517 2.1785026 3.04497 3.8736668 3.83025l-2.5285277.22893c-.851162.0772-1.5611978-.70312-1.5632139-1.58491zm5.5205949.6413c.526169.22132 1.1036168.34365 1.7094544.34365.6056683 0 1.1830712-.12245 1.7089406-.34365l2.267046 2.25361c-1.151343.7244-2.5137535 1.14463-3.9759866 1.14463-1.4623309 0-2.8247949-.42066-3.9764997-1.14515z" font-variant-ligatures="normal" font-variant-position="normal" font-variant-caps="normal" font-variant-numeric="normal" font-variant-alternates="normal" font-feature-settings="normal" text-indent="0" text-align="start" text-decoration-line="none" text-decoration-style="solid" text-decoration-color="rgb(0,0,0)" text-transform="none" text-orientation="mixed" white-space="normal" shape-padding="0" isolation="auto" mix-blend-mode="normal" solid-color="rgb(0,0,0)" solid-opacity="1" vector-effect="none" paint-order="stroke fill markers"/>
                        </g>
                    </svg>
                    <span> Tickets </span>
                </a>
            </li>
           
           
          
            <li class="side-nav-item">
                <a href="{{ route('admin.my-account.edit', Auth::guard('administrator')->id()) }}" class="side-nav-link">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                            width="20" height="20" xml:space="preserve">
                            <g>
                                <g fill="currentColor">
                                    <path d="M256,151c-57.897,0-105,47.103-105,105c0,57.897,47.103,105,105,105c57.897,0,105-47.103,105-105
   C361,198.103,313.897,151,256,151z M256,331c-41.355,0-75-33.645-75-75c0-41.355,33.645-75,75-75s75,33.645,75,75
   S297.355,331,256,331z" />
                                </g>
                            </g>
                            <g>
                                <g fill="currentColor">
                                    <path d="M500.582,211.434l-58.674-14.428c-3.532-11.13-8.068-21.925-13.551-32.249c8.78-14.634,27.343-45.573,27.343-45.573
   c3.541-5.902,2.611-13.457-2.256-18.324l-42.426-42.426c-4.867-4.867-12.422-5.797-18.324-2.256
   c-0.38,0.228-30.777,18.466-45.626,27.355c-10.269-5.431-20.995-9.927-32.052-13.434c-4.428-17.976-14.451-58.686-14.452-58.686
   C298.914,4.711,292.902,0,286,0h-60c-6.903,0-12.915,4.711-14.565,11.414c-4.126,16.76-11.024,44.779-14.45,58.68
   c-11.762,3.73-23.143,8.578-34.001,14.482c-6.428-3.856-16.007-9.604-24.869-14.921l-22.462-13.477
   c-5.905-3.541-13.457-2.61-18.324,2.256L54.901,100.86c-4.867,4.867-5.797,12.422-2.256,18.324
   c0.2,0.335,17.785,29.644,29.271,48.869c-4.712,9.31-8.665,18.986-11.817,28.919c-20.002,4.976-58.223,14.35-58.671,14.46
   C4.718,213.077,0,219.092,0,226v60c0,6.909,4.719,12.923,11.429,14.568c0.443,0.109,38.381,9.411,58.687,14.436
   c3.565,11.302,8.184,22.273,13.796,32.78l-26.194,43.66c-3.541,5.902-2.611,13.458,2.256,18.324l42.427,42.427
   c4.867,4.868,12.421,5.797,18.324,2.256c0.369-0.222,29.463-17.678,43.746-26.227c10.419,5.547,21.313,10.131,32.547,13.692
   l14.416,58.66C213.079,507.284,219.093,512,226,512h60c6.904,0,12.917-4.713,14.566-11.418l14.427-58.669
   c11.539-3.661,22.671-8.39,33.257-14.128c14.427,8.656,44.444,26.667,44.444,26.667c5.901,3.541,13.457,2.612,18.324-2.256
   l42.426-42.427c4.867-4.867,5.797-12.422,2.256-18.324c0,0-18.271-30.452-26.958-44.931c5.308-10.088,9.712-20.634,13.161-31.511
   c17.824-4.399,58.19-14.317,58.676-14.436C507.285,298.919,512,292.906,512,286v-60C512,219.095,507.287,213.083,500.582,211.434z
   M482,274.24c-17.32,4.257-48.723,11.979-54.72,13.479l-1.131,0.283c-5.231,1.36-9.326,5.43-10.719,10.653
   c-3.795,14.229-9.495,27.872-16.942,40.548c-2.779,4.732-2.753,10.605,0.069,15.312c0.78,1.301,16.489,27.483,25.393,42.322
   L398.087,422.7c-15.046-9.027-41.716-25.029-41.942-25.165c-4.775-2.866-10.743-2.853-15.501,0.035
   c-13,7.885-27.109,13.892-41.938,17.854c-5.177,1.383-9.224,5.422-10.614,10.597c-0.828,3.081-1.644,6.34-1.658,6.397L274.241,482
   h-36.479l-10.813-44.042l-2.916-11.664c-1.322-5.292-5.415-9.45-10.686-10.855c-14.533-3.876-28.479-9.747-41.449-17.447
   c-4.709-2.797-10.57-2.802-15.285-0.018c-3.23,1.908-27.254,16.313-41.282,24.728l-25.865-25.865l24.661-41.104
   c2.841-4.736,2.85-10.65,0.022-15.395c-7.784-13.063-13.685-27.073-17.535-41.643c-1.397-5.286-5.56-9.393-10.863-10.719
   c-10.737-2.684-39.564-9.767-55.752-13.741v-36.473c16.342-4.015,45.537-11.199,55.762-13.786
   c5.271-1.334,9.408-5.417,10.812-10.671c3.564-13.347,8.822-26.228,15.63-38.286c2.646-4.686,2.578-10.43-0.177-15.053
   c-7.25-12.166-20.08-33.577-27.632-46.172l25.865-25.866l12.42,7.452c14.968,8.981,31.98,19.188,32.44,19.463
   c4.768,2.85,10.722,2.832,15.472-0.049c13.341-8.088,27.726-14.222,42.756-18.232c5.264-1.404,9.352-5.552,10.68-10.836
   c0.282-1.121,9.071-36.815,13.728-55.726h36.49c4.915,19.958,13.621,55.312,13.724,55.722c1.326,5.288,5.417,9.44,10.685,10.845
   c14.382,3.836,28.193,9.626,41.05,17.208c4.714,2.781,10.57,2.773,15.276-0.021c4.208-2.498,28.881-17.293,43.106-25.827
   l25.864,25.864c-9.037,15.062-25.121,41.869-25.795,42.991c-2.836,4.725-2.853,10.625-0.043,15.367
   c7.628,12.872,13.451,26.714,17.308,41.141c1.382,5.167,5.408,9.207,10.57,10.604c3.097,0.839,6.373,1.657,6.428,1.671
   L482,237.758V274.24z" />
                                </g>
                            </g>
                        </svg>
                    <span> Settings </span>
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

</div>
