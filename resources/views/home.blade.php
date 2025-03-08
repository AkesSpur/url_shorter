<x-general>
   <div class="container-fluid main-div">
      <!-- header -->
      <div class="top_header">
         <nav class="navbar ps-4 pe-2 header">
            <div class="brand d-flex justify-content-center w-100 ">
               <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid logo" alt="Logo">
            </div>
         </nav>
      </div>
   
      <!-- introduction section -->
      <div class="intro d-flex">
         <div class="link">
            <label for="url">
            <i class="fa fa-link" ></i>
            </label>
         </div>
         <div class="intro-left-side col-lg-6  col-md-12 hero_text">
            <div class="big">
               Откройте для себя простоту в цифровом мире с помощью нашего
               <span class="name"> <u>Устройство для укорачивания звеньев. </u></span>
            </div>
   
            <div class="small text-wrap">
               <span>
                  Улучшите свой опыт работы в Интернете, без особых усилий преобразовав длинные URL-адреса в краткие ссылки, доступные для общего доступа. Используйте эффективность, общедоступность и стиль в каждом клике. Добро пожаловать в новую эру оптимизированных подключений, где каждая ссылка рассказывает историю, а простота царит безраздельно
               </span>
            </div>
            <!-- Form Input -->
            <div class="formContainer">
               <form method="POST" action="{{ route('url.store') }}">
                  @csrf
                  <fieldset class="fieldInput col-lg-6  col-md-7 col-sm-7 col-12">
                     <input class="form-input" id="url" name='url' type="url" placeholder="Paste Url">
                     <button type="submit" class="form-submit">
                        {{ __('Submit') }}
                     </button>
                  </fieldset>
                  @if ($errors->any())
                  <div class="text-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
               </form>
            </div>
         </div>
   
         <div class="d-none d-lg-block  hero_illustrator blob_holder">
               <img src="{{ asset('assets/img/blob.gif') }}" class="img-fluid blob_img">
         </div>
   
      </div>
   
      <!-- footer -->
      <div class="footer">
         <div class="w-100 copy-right-info text-center">
            <p>Copyright © 2023 WebSpur</p>
   
         </div>
      </div>
   
      <!-- Modal that would display the link -->
      <div class="modal hide fade" id="myModal">
         <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Modal header</h3>
         </div>
         <div class="modal-body">
            <p>One fine body…</p>
         </div>
         <div class="modal-footer">
            <a href="#" class="btn">Close</a>
            <a href="#" class="btn btn-primary">Save changes</a>
         </div>
      </div>
   
   
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="">
                     <h5 class="info text-center">
                        Here is your link
                     </h5>
                     <div class="modal-input">
                        <fieldset class="modal-fieldset fieldInput col-lg-6  col-md-7 col-sm-7 col-12">
                           <input class="form-input" id="url" type="url"
                            value="@isset($data){{ $data }} @endisset" disabled>
                           <button class="form-submit" id="copyButton">
                              Copy
                           </button>
                        </fieldset>
                        <div class="success-message text-success">
                           <p id="success-message"></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>  
       <!-- custom js for modal -->
    @isset($data)<script src="{{ asset('js/index.js') }}"></script>  @endisset
 
</x-general>


