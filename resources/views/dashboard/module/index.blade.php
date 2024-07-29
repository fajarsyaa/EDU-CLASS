@extends('layouts.app')
@section('title', 'Edu Class | User List')
@section('content')
<div>
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Name Class</h4>
                </div>
             </div>
             <div class="card-body px-0">
             </div>
          </div>
       </div>
       <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between pb-4">
               <div class="header-title">
                  <div class="d-flex flex-wrap">
                     <div class="media-support-user-img me-3">
                        <img class="rounded-pill img-fluid avatar-60 p-1 bg-soft-info" src="../../assets/images/avatars/05.png" alt="">
                     </div>
                     <div class="media-support-info mt-2">
                        <h5 class="mb-0">John Doe</h5>
                        <p class="mb-0 text-primary">Teacher</p>
                     </div>
                  </div>
               </div>                        
               <div class="dropdown">
                  <span class="dropdown-toggle" id="dropdownMenuButton07" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                  1 Hr
                  </span>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton07">
                     <a class="dropdown-item " href="javascript:void(0);">Action</a>
                     <a class="dropdown-item " href="javascript:void(0);">Another action</a>
                     <a class="dropdown-item " href="javascript:void(0);">Something else here</a>
                  </div>
               </div>
            </div>
            <div class="card-body p-0">
                  <p class="p-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus</p>
                  <div class="comment-area p-3"><hr class="mt-0">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                     <div class="d-flex align-items-center">
                        <a class="d-flex align-items-center feather-icon ms-1" onclick="showComments()">
                           <svg class="icon-20" width="20" viewBox="0 0 24 24">
                               <path fill="currentColor" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M10,16V19.08L13.08,16H20V4H4V16H10Z" />
                           </svg>
                           <span class="ms-1">140</span>
                       </a>
                       
                     </div>
                  </div>
                  <ul class="list-inline rounded m-0 border p-1" id="comments" hidden>
                  </ul>
                  <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                     <input type="text" class="form-control rounded" placeholder="Lovely!">
                     <div class="comment-attagement d-flex">
                        <a href="javascript:void(0);" class="text-body">
                           <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    
                              <path d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                              </path>                                
                           </svg>                            
                        </a>
                     </div>
                  </form>
               </div>                              
            </div>
         </div>
       </div>
    </div>
 </div>
@endsection

@section('scripts')
<script>
   const showComments = () => {
       const comments = $('#comments');

       if (comments.is('[hidden]')) {
           comments.removeAttr('hidden');
           comments.append(`
               <li class="mb-2 border rounded p-2 bg-white">
                   <div class="d-flex">
                       <img src="../../assets/images/avatars/03.png" alt="userimg" class="avatar-50 p-1 pt-2 bg-soft-primary rounded-pill img-fluid">
                       <br/>
                       <div class="ms-3">
                           <h6 class="mb-1">Monty Carlo</h6>
                           <p class="mb-1">Lorem ipsum dolor sit amet</p>
                           <div class="d-flex flex-wrap align-items-center mb-1">
                               <span> 5 min </span>
                           </div>
                       </div>
                   </div>
               </li>
           `);
       } else {
           comments.attr('hidden', true);
           comments.empty();
       }
   }
</script>