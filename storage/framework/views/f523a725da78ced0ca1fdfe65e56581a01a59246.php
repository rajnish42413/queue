<?php $__env->startSection('title', trans('messages.add').' '.trans('messages.mainapp.menu.counter')); ?>

<?php $__env->startSection('content'); ?>
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem"><?php echo e(trans('messages.add')); ?> <?php echo e(trans('messages.mainapp.menu.counter')); ?></h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('messages.mainapp.menu.dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('counters.index')); ?>"><?php echo e(trans('messages.mainapp.menu.counter')); ?></a></li>
                        <li class="active"><?php echo e(trans('messages.add')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3" style="padding-top:10px;padding-bottom:10px">
                <a class="btn-floating waves-effect waves-light orange tooltipped right" href="<?php echo e(route('counters.index')); ?>" data-position="top" data-tooltip="<?php echo e(trans('messages.cancel')); ?>"><i class="mdi-navigation-arrow-back"></i></a>
                <form id="add" action="<?php echo e(route('counters.store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="name"><?php echo e(trans('messages.name')); ?></label>
                            <input id="name" type="text" name="name" placeholder="<?php echo e(trans('messages.mainapp.menu.counter')); ?> <?php echo e(trans('messages.name')); ?>" value="<?php echo e(old('name')); ?>" data-error=".name">
                            <div class="name">
                                <?php if($errors->has('name')): ?><div class="error"><?php echo e($errors->first('name')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>


                  <div class="row">
                        <div class="input-field col s12">
                              <select class="browser-default" id="vendor" data-error=".vendor" name="vendor">
                                <option value="">Select User</option>
                                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>        
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->username); ?>  </option> 
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              </select>
                              <div class="vendor">
                                <?php if($errors->has('vendor')): ?><div class="error"><?php echo e($errors->first('vendor')); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>

                <div class="row">
                        <div class="input-field col s12">
                            <select class="browser-default" id="dep" data-error=".dep" name="dep">
                                 <option value="">Select <?php echo e(trans('messages.mainapp.menu.department')); ?></option>
                            </select>
                            <div class="name">
                                <?php if($errors->has('dep')): ?><div class="error"><?php echo e($errors->first('dep')); ?></div><?php endif; ?>
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
                vendor: {
                    required: true
                },
                dep: {
                    required: true
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

$('#vendor').on('change',function(){
      var v_id =$(this).val();
      var _token = $('input[name="_token"]').val();
       if (v_id == '') 
     {
       $('#dep').prop('disabled',true);
     }
     else
     {
       $('#dep').prop('disabled',false);
       $.ajax({
            url:'<?php echo e(route('post_fetch')); ?>',
            type:"POST",
            data:{'v_id' : v_id,_token:_token,},
            dataType: 'json',
            success:function(result){
                 $('#dep').html(result);
            }
       });
     }
    });

</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>