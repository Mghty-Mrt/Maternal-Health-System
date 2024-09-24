           <!-- Index Encoder -->
           <div class="d-flex justify-content-center">
               <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
               <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Index Form</small> <br> <small class="fs-3">(  <?php if($index[0]->registration_type_id == 1){ ?> Online Patient <?php } else { ?> Walk-in Patient <?php } ?> )</small> </h5>
               <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
           </div>
           <hr class="border-5 mb-4">

           <form id="indexForm">
               <div class="row">
                <!-- <?php // if($index[0]->registration_type_id == 1){ ?>
               <div class="col-md-2">
                    <label for="code" class="">Code</label>
                    <input list="residentsList" type="number" class="form-control shadow-none" id="code" placeholder="Enter code" autocomplete="off" value=" <?= $index[0]->firstname ?> ">
                    <datalist id="residentsList">
                    </datalist>
                </div>

                <div class="col-md-6">
                    <label for="cname" class="">Name</label>
                    <input type="text" class="form-control shadow-none" id="cname" placeholder="Complete Name" value=" <?= $index[0]->firstname ?> <?= $index[0]->middlename ?> <?= $index[0]->lastname ?> ">
                </div>
                <?php // } else { ?> -->

                   <div class="col-md-8">
                       <label for="cname" class="">Name</label>
                       <input list="residentsList" type="text" class="form-control shadow-none" id="cname" placeholder="Type name here..." autocomplete="off" value=" <?= $index[0]->firstname ?> <?= $index[0]->middlename ?> <?= $index[0]->lastname ?> ">
                       <datalist id="residentsList">
                           <!-- Resident options will be populated here -->
                       </datalist>
                   </div>
                <?php // } ?>

                   <div class="col-md-4">
                       <label for="spe" class="">Send To</label>
                       <select class="form-select shadow-none" name="spe" id="spe">
                           <?php foreach ($speData as $perSpe) { ?>
                                    <?= $id = $index[0]->system_users_id ?>
                               <option value="<?= $perSpe->id == $id ?>"><?= $perSpe->rcode ?>. <?= $perSpe->firstname ?> <?= $perSpe->middlename ?> <?= $perSpe->lastname ?></option>
                           <?php } ?>
                       </select>
                   </div>
               </div>

               <div class="col-md-12 mt-3">
                   <label for="address" class="">Address</label>
                   <input type="text" class="form-control shadow-none" id="address" placeholder="Address" value=" <?= $index[0]->street ?> <?= $index[0]->fname ?> <?= $index[0]->city ?> ">
               </div>

               <div class="row mt-3">
                   <div class="col-md-3">
                       <label for="dateOfBirth" class="">Birthday</label>
                       <input type="date" class="form-control shadow-none" id="dateOfBirth" value="<?= $index[0]->birthdate ?>">
                   </div>
                   <div class="col-md-3">
                       <label for="age" class="">Age</label>
                       <input type="number" class="form-control shadow-none" id="age" placeholder="Age" value="<?= $index[0]->age ?>">
                   </div>
                   <div class="col-md-3">
                       <label for="contactNo" class="">Contact Number</label>
                       <input type="number" class="form-control shadow-none" id="contactNo" placeholder="Contact No." value="<?= $index[0]->mobileno ?>">
                   </div>
                   <div class="col-md-3">
                       <label for="cstatus" class="">Civil Status</label>
                       <input type="text" class="form-control shadow-none" id="cstatus" placeholder="Civil Status" value="<?= $index[0]->civilStatus ?>">
                   </div>

                   <div class="col-md-3 mt-3">
                       <label for="wt" class="">Weight</label>
                       <div class="input-group">
                           <input type="number" class="form-control shadow-none" name="wt" id="wt" placeholder="kg." value="<?= $index[0]->weight ?>">
                       </div>
                   </div>

                   <div class="col-md-3 mt-3">
                       <label for="ht" class="">Height</label>
                       <div class="input-group">
                           <input type="number" class="form-control shadow-none" name="ht" id="ht" placeholder="cm." value="<?= $index[0]->height ?>" required>
                       </div>
                   </div>

                   <div class="col-md-3 mt-3">
                       <label for="temp" class="">Temperature</label>
                       <div class="input-group">
                           <input type="text" class="form-control shadow-none" name="temp" id="temp" value="<?= $index[0]->temp ?>" required>
                       </div>
                   </div>

                   <div class="col-md-3 mt-3">
                       <label for="bp" class="">Blood Pressure</label>
                       <div class="input-group">
                           <input type="text" class="form-control shadow-none" name="bp" id="bp" value="<?= $index[0]->bp ?>" required>
                       </div>
                   </div>

                   <hr class="border-5 mb-3 mt-4">
               </div>