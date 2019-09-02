<?php $__env->startSection('title', trans('messages.add').' '.trans('messages.mainapp.menu.users')); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.add')); ?> <?php echo e(trans('messages.mainapp.menu.users')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('users.index')); ?>"><?php echo e(trans('messages.mainapp.menu.users')); ?></a></li>
                        <li class="active"><?php echo e(trans('messages.add')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3" style="padding-top:10px;padding-bottom:10px">
                <a class="btn-floating waves-effect waves-light orange tooltipped right" href="<?php echo e(route('users.index')); ?>" data-position="top" data-tooltip="<?php echo e(trans('messages.cancel')); ?>"><i class="mdi-navigation-arrow-back"></i></a>
                <form id="add" action="<?php echo e(route('users.store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="name"><?php echo e(trans('messages.name')); ?></label>
                            <input id="name" type="text" name="name" placeholder="<?php echo e(trans('messages.name')); ?>" value="<?php echo e(old('name')); ?>" data-error=".name">

                            <div class="name">
                                <?php if($errors->has('name')): ?><div class="error"><?php echo e($errors->first('name')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="created_by" value="<?php echo e(Auth::id()); ?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="username"><?php echo e(trans('messages.users.username')); ?></label>
                            <input id="username" type="text" name="username" placeholder="<?php echo e(trans('messages.users.username')); ?>" value="<?php echo e(old('username')); ?>" data-error=".username">
                            <div class="username">
                                <?php if($errors->has('username')): ?><div class="error"><?php echo e($errors->first('username')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="email"><?php echo e(trans('messages.users.email')); ?></label>
                            <input id="email" type="text" name="email" placeholder="<?php echo e(trans('messages.users.email')); ?>" value="<?php echo e(old('email')); ?>" data-error=".email">
                            <div class="email">
                                <?php if($errors->has('email')): ?><div id="name-error" class="error"><?php echo e($errors->first('email')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <label for="role"><?php echo e(trans('messages.users.role')); ?></label>
                              <select class="browser-default" id="role" data-error=".role" name="role">
                                  <option value="">Select <?php echo e(trans('messages.users.role')); ?> </option>
                                  <?php if( Auth::user()->role == 'SA'): ?>                                      
                                  <option value="A"> Administrator</option>
                                  <option value="VE"> Vendor Employees</option>
                                  <option value="VS"> Vendor Employees Counter Staff</option>
                                  <?php endif; ?>

                                  <?php if( Auth::user()->role == 'A'): ?>                                      
                                  <option value="A"> Administrator</option>
                                  <option value="VE"> Vendor Employees</option>
                                  <option value="VS"> Vendor Employees Counter Staff</option>
                                  <?php endif; ?>

                                   <?php if( Auth::user()->role == 'VE'): ?>       
                                  <option value="VS"> Vendor Employees Counter Staff</option>
                                  <?php endif; ?>
                              </select>
                              <div class="vendor">
                                <?php if($errors->has('role')): ?><div class="error"><?php echo e($errors->first('role')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>

                   <?php if( Auth::user()->role == 'SA'): ?>  
                    <div class="row">
                        <div class="col s12">
                            <label for="role">Select Company</label>
                              <select class="browser-default" id="company" data-error=".company" name="company">
                                <option value=""> Select Company</option>
                                 <?php $__currentLoopData = $comps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                     <option value="<?php echo e($comp->id); ?>"> <?php echo e($comp->name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                              </select>
                              <div class="vendor">
                                <?php if($errors->has('company')): ?><div class="error"><?php echo e($errors->first('company')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <input type="hidden" name="company" value="<?php echo e(Auth::user()->company); ?>">
                    <?php endif; ?>





                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password"><?php echo e(trans('messages.users.password')); ?></label>
                            <input id="password" type="password" name="password" placeholder="<?php echo e(trans('messages.users.password')); ?>" value="<?php echo e(old('password')); ?>" data-error=".password">
                            <div class="password">
                                <?php if($errors->has('password')): ?><div id="name-error" class="error"><?php echo e($errors->first('password')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password_confirmation"><?php echo e(trans('messages.users.confirm')); ?> <?php echo e(trans('messages.users.password')); ?></label>
                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="<?php echo e(trans('messages.users.confirm')); ?> <?php echo e(trans('messages.users.password')); ?>" value="<?php echo e(old('password_confirmation')); ?>" data-error=".password_confirmation">
                            <div class="password_confirmation">
                                <?php if($errors->has('password_confirmation')): ?><div id="name-error" class="error"><?php echo e($errors->first('password_confirmation')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right" type="submit">
                                <?php echo e(trans('messages.save')); ?><i class="mdi-content-save left"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $("#add").validate({
            rules: {
                name: {
                    required: true
                },
                username: {
                    required: true,
                    minlength: 6
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                company:{
                   required: true, 
               },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>