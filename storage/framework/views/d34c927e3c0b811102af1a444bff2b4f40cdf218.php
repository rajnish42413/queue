<?php $__env->startSection('title', trans('messages.add').' '.trans('messages.company.company')); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.add')); ?> <?php echo e(trans('messages.company.company')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('company.index')); ?>"><?php echo e(trans('messages.company.company')); ?></a></li>
                        <li class="active"><?php echo e(trans('messages.add')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3" style="padding-top:10px;padding-bottom:10px">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title" style="line-height:0;font-size:22px"><?php echo e(trans('messages.company.company')); ?> <?php echo e(trans('messages.add')); ?></span>
                            <div class="divider" style="margin:10px 0 10px 0"></div>
                            <form id="company" action="<?php echo e(route('company.store')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                               <div class="row">
                                    <div class="input-field col s12">
                                        <label for="name"><?php echo e(trans('messages.name')); ?></label>
                                        <input id="name" type="text" name="name" placeholder="<?php echo e(trans('messages.name')); ?>" value="" data-error=".cname">
                                        <div class="cname">
                                            <?php if($errors->has('name')): ?><div class="error"><?php echo e($errors->first('name')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="email"><?php echo e(trans('messages.users.email')); ?></label>
                                        <input id="email" type="text" name="email" placeholder="<?php echo e(trans('messages.users.email')); ?>" value="" data-error=".cemail">
                                        <div class="cemail">
                                            <?php if($errors->has('email')): ?><div id="name-error" class="error"><?php echo e($errors->first('email')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="address"><?php echo e(trans('messages.company.address')); ?></label>
                                        <textarea id="address" class="materialize-textarea" name="address" placeholder="<?php echo e(trans('messages.company.address')); ?>" data-error=".address" style="min-height:67px"></textarea>
                                        <div class="address">
                                            <?php if($errors->has('address')): ?><div class="error"><?php echo e($errors->first('address')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="phone"><?php echo e(trans('messages.company.phone')); ?></label>
                                        <input id="phone" type="text" name="phone" placeholder="<?php echo e(trans('messages.company.phone')); ?>" value="" data-error=".phone">
                                        <div class="phone">
                                            <?php if($errors->has('phone')): ?><div id="name-error" class="error"><?php echo e($errors->first('phone')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="location"><?php echo e(trans('messages.company.location')); ?></label>
                                        <input id="location" type="text" name="location" placeholder="<?php echo e(trans('messages.company.location')); ?>" value="" data-error=".location">
                                        <div class="location">
                                            <?php if($errors->has('location')): ?><div id="name-error" class="error"><?php echo e($errors->first('location')); ?></div><?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right" type="submit">
                                            <?php echo e(trans('messages.save')); ?><i class="mdi-action-swap-vert left"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
 $("#company").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        email: true
                    }
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