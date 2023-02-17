<div class="container-fluid py-4">
<div class="row">
   <div class="col-12">
      <div class="card my-4">
         <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
               <h6 class="text-white text-capitalize ps-3">Users table</h6>
            </div>
         </div>
         <div class="card-body px-0 pb-2">
            <div class="col-sm-3"> Welcome <?php
            $session = $this->request->getSession();
            echo $session->read("users_details.user_profile.first_name");
            ?></div>
            <br>
            <div class="table-responsive p-0">
               <table class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Users</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact Number</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="3">Action</th>
                        <th class="text-secondary opacity-7"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($users as $user):
                         if ($user->delete_status == 1) {
                             continue;
                         } ?>
                     <tr id='data<?= $user->id ?>'>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div>
                                 <?= $this->Html->image(
                                     "/" .
                                         "upload/" .
                                         $user->user_profile->profile_image,
                                     [
                                         "class" =>
                                             "avatar avatar-sm me-3 border-radius-lg  ",
                                     ]
                                 ) ?>
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm"><?= h(
                                     $user->user_profile->first_name
                                 ) ?></h6>
                                 <p class="text-xs text-secondary mb-0"><?= h(
                                     $user->email
                                 ) ?></p>
                              </div>
                           </div>
                        </td>
                        <td>
                           <p class="text-xs font-weight-bold mb-0"><?= h(
                               $user->user_profile->contact
                           ) ?></p>
                           <p class="text-xs text-secondary mb-0"><?= h(
                               $user->user_profile->address
                           ) ?></p>
                        </td>
                        <?php if ($user->status == 2): ?>
                        <td class="align-middle text-center text-sm">
                           <?= $this->Form->postLink(
                               __("InActive"),
                               [
                                   "action" => "userstatus",
                                   $user->id,
                                   $user->status,
                               ],
                               ["class" => "badge badge-sm bg-gradient-danger"],
                               [
                                   "confirm" => __(
                                       "Are you sure you want to Active # {0}?",
                                       $user->id
                                   ),
                               ]
                           ) ?>
                        </td>
                        <?php else: ?>
                        <td class="align-middle text-center text-sm"><?= $this->Form->postLink(
                            __("Active"),
                            [
                                "action" => "userstatus",
                                $user->id,
                                $user->status,
                            ],
                            ["class" => "badge badge-sm bg-gradient-success"],
                            [
                                "confirm" => __(
                                    "Are you sure you want to InActive # {0}?",
                                    $user->id
                                ),
                            ]
                        ) ?>
                           <?php endif; ?>
                        </td>
                        <td class="align-middle text-center">
                           <span class="text-secondary text-xs font-weight-bold"><?= h(
                               $user->created_date
                           ) ?></span>
                        </td>
                        <td class="align-middle text-center">
                           <?= $this->Html->link(__("View"), [
                               "action" => "view",
                               $user->id,
                           ]) ?>
                           <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary editUser" data-id="<?= $user->id ?>">Edit</a>
                           <a href="javascript:void(0)" class="btn-delete-student" data-id="<?= $user->id ?>">Delete</a>
                        </td>
                     </tr>
                     <?php
                     endforeach; ?>
                     <!-- <?php echo $this->element("editmodal"); ?> -->
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <!--============= hidden image and id if image is not updated ============ -->
                                 <?php echo $this->Form->create(null, [
                                     "type" => "file",
                                     "id" => "useredit",
                                 ]); ?>
                                 <input type="hidden" id="imagedd" name="imagedd">
                                 <input type="hidden" id="iddd" name="iddd">
                                 <div class="input-group input-group-outline mb-3">
                                    <?php echo $this->Form->control(
                                        "user_profile.first_name",
                                        [
                                            "required" => false,
                                            "class" => "form-control",
                                            "id" => "firstname",
                                        ]
                                    ); ?>
                                    <?php echo $this->Form->control(
                                        "user_profile.last_name",
                                        [
                                            "required" => false,
                                            "class" => "form-control",
                                            "id" => "lastname",
                                        ]
                                    ); ?>
                                    <?php echo $this->Form->control(
                                        "user_profile.contact",
                                        [
                                            "required" => false,
                                            "class" => "form-control",
                                            "id" => "contact",
                                        ]
                                    ); ?>
                                    <?php echo $this->Form->control(
                                        "user_profile.address",
                                        [
                                            "required" => false,
                                            "class" => "form-control",
                                            "id" => "address",
                                        ]
                                    ); ?>
                                    <?php echo $this->Form->control(
                                        "user_profile.profile_image",
                                        [
                                            "type" => "file",
                                            "class" => "form-control",
                                        ]
                                    ); ?> 
                                    <img src=""id="showimg" width="100px" alt=""> 
                                    <?php echo $this->Form->control("email", [
                                        "type" => "email",
                                        "class" => "form-control",
                                        "id" => "email",
                                    ]); ?>  
                                 </div>
                                 <div class="modal-footer">
                                    <?= $this->Form->button("Submit", [
                                        "class" => "btn btn-primary",
                                    ]) ?>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 </div>
                                 <?= $this->Form->end() ?>
                              </div>
                           </div>
                        </div>
                  </tbody>
               </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>