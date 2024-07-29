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
                  <div class="d-flex flex-wrap justify-content-between align-items-center">
                     <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center message-icon me-3">                                          
                           <svg class="icon-20" width="20"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                           </svg>
                           <span class="ms-1">140</span>
                        </div>
                        <div class="d-flex align-items-center feather-icon">
                           <svg class="icon-20" width="20"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M10,16V19.08L13.08,16H20V4H4V16H10Z" />
                           </svg>
                           <span class="ms-1">140</span>
                        </div>
                     </div>
                  </div>
                  <ul class="list-inline pt-3 m-0">
                     <li class="mb-2">
                        <div class="d-flex">
                           <img src="../../assets/images/avatars/03.png" alt="userimg" class="avatar-50 p-1 pt-2 bg-soft-primary rounded-pill img-fluid">
                           <div class="ms-3">
                              <h6 class="mb-1">Monty Carlo</h6>
                              <p class="mb-1">Lorem ipsum dolor sit amet</p>
                              <div class="d-flex flex-wrap align-items-center mb-1">
                                 <a href="javascript:void(0);" class="me-3">
                                    <svg width="20"  class="text-body me-1 icon-20" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                                    </svg>
                                    like
                                 </a>
                                 <a href="javascript:void(0);" class="me-3">
                                    <svg width="20"  class="me-1 icon-20" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M8,9.8V10.7L9.7,11C12.3,11.4 14.2,12.4 15.6,13.7C13.9,13.2 12.1,12.9 10,12.9H8V14.2L5.8,12L8,9.8M10,5L3,12L10,19V14.9C15,14.9 18.5,16.5 21,20C20,15 17,10 10,9" />
                                    </svg>
                                    reply
                                 </a>
                                 <a href="javascript:void(0);" class="me-3">translate</a>
                                 <span> 5 min </span>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="d-flex">
                           <img src="../../assets/images/avatars/04.png" alt="userimg" class="avatar-50 p-1 bg-soft-danger rounded-pill img-fluid">
                           <div class="ms-3">
                              <h6 class="mb-1">Paul Molive</h6>
                              <p class="mb-1">Lorem ipsum dolor sit amet</p>
                              <div class="d-flex flex-wrap align-items-center">
                                 <a href="javascript:void(0);" class="me-3">
                                    <svg width="20"  class="text-body me-1 icon-20" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                                    </svg>
                                    like
                                 </a>
                                 <a href="javascript:void(0);" class="me-3">
                                    <svg width="20"  class="me-1 icon-20" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M8,9.8V10.7L9.7,11C12.3,11.4 14.2,12.4 15.6,13.7C13.9,13.2 12.1,12.9 10,12.9H8V14.2L5.8,12L8,9.8M10,5L3,12L10,19V14.9C15,14.9 18.5,16.5 21,20C20,15 17,10 10,9" />
                                    </svg>
                                    reply
                                 </a>
                                 <a href="javascript:void(0);" class="me-3">translate</a>
                                 <span> 5 min </span>
                              </div>
                           </div>
                        </div>
                     </li>
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