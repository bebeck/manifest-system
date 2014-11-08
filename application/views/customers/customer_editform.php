 
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm(function() { 
                alert("Update Success"); 
            }); 
        }); 
    </script> 
<style>


.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}


</style>

<div id="wrapper">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Customer Form
                    </div>
                    <div class="panel-body">
                    
             
   
   

<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
<form role="form" method="post" id="myForm" action=	"<?php site_url().'customers/edit'?>">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>
                
                <div class="form-group">
                        <label>Reference Id</label>
            <input id="reference_id"  name="reference_id"  type="text"  class="form-control" value="<?=$getUser->reference_id ?>" readonly>
                    </div>
                 <div class="form-group">
                    <label>Name</label>
                    <input id="name" name="name" required type="text" placeholder="Please fill name field" class="form-control" value="<?= $getUser->name?>">
                </div>
                                

                                     <div class="form-group">
                                      <label >E-mail</label>
                                 <?php if($getUser->email != "" ){$val = $getUser->email;}else $val= "";?>     
                                  <input id="email" name="email" type="text"class="form-control" value="<?= $val ?>">
                                </div>
                                
                                  <div class="form-group">
                           <label>Address</label>
                           <?php if($getUser->address != "" ){$val = $getUser->address;}else $val= "";?>   
                      <textarea name="address" rows="5" style="resize:none" class="form-control" required><?= $val ?></textarea>
                                        </div>
                                        
                                  <div class="form-group">
                                    <label>Attn</label>
                                    <?php if($getUser->sort_name != "" ){$val = $getUser->sort_name;}else $val= "";?>  
                                   <input id="attn" required name="attn" type="text" value="<?= $val ?>"class="form-control">
                                   
                                </div>     
                             
                             
                              <div class="form-group">
                                      <label >State</label>
                                      <?php if($getUser->state != "" ){$val = $getUser->state;}else $val= "";?>  
                                        <input id="state" name="state" type="text" class="form-control" value="<?= $val ?>">
             
          					  </div>
                            
                        <div class="form-group">
                                  <label>City</label>
                                 <?php if($getUser->city != "" ){$val = $getUser->city;}else $val= "";?> 
                                      <input id="city" name="city" type="text" class="form-control" value="<?=$val?>">
                                      
                                  
                                </div>
            
            
            					<div class="form-group">
                                <label>Country</label>
                                <select class="form-control bfh-states country" name="country">
                               
                                    <?php
									
									if($getUser->country != "" ){$val = $getUser->country;}else $val="";
									 echo '<option value="'.$value.'" '.$selected.'>'.$val.'</option>';
                                        foreach ($this->customers_model->list_country() as $key => $value) {
									       $selected = (strtolower($value) == $val) ? 'selected' : '';
											  
                                            echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                                        }
									
                                    ?>
                                </select>
                            </div>
            
                           
                            
           
            
             <div class="form-group">
              <label >Post Code</label>
             <?php if($getUser->post_code != "" ){$val = $getUser->post_code;}else $val= "";?> 
                <input id="post_code" name="post_code" type="text" class="form-control" value="<?=$val ?>">	
             
            </div>             
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>
                    
      <div class="form-group" >
              <label>Phone</label>
               <?php if($getUser->phone != "" ){$val = $getUser->phone;}else $val= "";?> 
                <input id="phone" name="phone" type="text" placeholder="" class="form-control" value="<?= $val?>">
             
            </div>
                  
         <div class="form-group">
          <label >Mobile</label>
          <?php if($getUser->mobile != "" ){$val = $getUser->mobile;}else $val= "";?> 
            <input id="mobile" name="mobile" type="text" placeholder="" class="form-control" value="<?= $val ?>">
          
        </div>
        <div class="form-group">
          <label >Fax</label>
          <?php if($getUser->fax != "" ){$val = $getUser->fax;}else $val= "";?> 
            <input id="fax" name="fax" type="text" class="form-control" value="<?=$val ?>">
         
        </div>
                            
         <div class="form-group">
              <label >Bank Branch</label>
               <?php if($getUser->bank_branch != "" ){$val = $getUser->bank_branch;}else $val= "";?> 
             <input id="bank_branch" name="bank_branch" type="text" placeholder="" class="form-control" value="<?=$val?>">      
               
               </div>

       <div class="form-group">
                <label >Bank Code</label>
                <?php if($getUser->bank_code != "" ){$val = $getUser->bank_code;}else $val= "";?> 
                <input id="bank_code" name="bank_code" type="text" placeholder="" class="form-control" value="<?=$val ?>">
             </div>     

            <div class="form-group">
            <label >Bank Account</label>
            <?php if($getUser->bank_account != "" ){$val = $getUser->bank_account;}else $val= "";?> 
            <input id="bank_account" name="bank_account" type="text" placeholder="" class="form-control" value="<?= $val ?>">      						 </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
                
                <div class="form-group" style="margin-top:10px;">
              <label >Tax Class</label>
              <?php if($getUser->tax_class != "" ){$val = $getUser->tax_class;}else $val= "";?> 
             			  <select required class="form-control" name="tax_class">
                          <option value="<?= $val?>"><?=$val?>%</option>
                          	<option value="0">None</option>
               				<option value="1">1%</option>
                            <option value="10">10%</option>
                            </select>
               
                </div>
                
              <div class="form-group">
              <label >VAT Doc</label>
              		 <?php if($getUser->vat_doc != "" ){$val = $getUser->vat_doc;}else $val= "";?> 
  					<input id="vat_doc" name="vat_doc" type="text" placeholder="" class="form-control" value="<?= $val?>">
					
             
               </div>
               
                <div class="form-group">
              <label>Type</label>
              		 <?php if($getUser->type != "" ){$val = $getUser->type;}else $val= "";?> 
  					 <select required class="form-control" name="type" >
                          <option value="<?=$val?>"><?=$val?></option>
               				<option value="shipper">Shipper</option>
                            <option value="consignee">Consignee</option>
                            </select>
               
               </div>
               
               
                 <div class="form-group">
              <label>Status</label>
              		
  					 <select required class="form-control" name="status" >
                     <?php if($getUser->status != "" ){$val = $getUser->status;}else $val= "";?> 
                          <option value="<?=$val?>"><?=$val?></option>
               				<option value="regular">regular customer</option>
                            </select>
               
               </div>
               
               
                <div class="form-group">
              <label >Register Doc</label>
              		 <?php if($getUser->register_doc != "" ){$val = $getUser->register_doc;}else $val= "";?> 
  					<input id="register_doc" name="register_doc" type="text" placeholder="" class="form-control" value="<?=$val?>">	
               
               </div>
               
               <div class="form-group">
              <label >Register Date</label>
  					 <div class='input-group date' id='datetimepicker1'>
                     <?php if($getUser->register_date != "" ){$val = $getUser->register_date;}else $val= "";?> 
                     <input type="text" name="register_date" class="form-control" id="register_date" readonly value="<?= $val?>">
                    <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-th"></i></span>
             
               </div>
               </div>
               
               
                 <div class="form-group">
              <label>Due Date Payment</label>
           
              <div class='input-group date' id='datetimepicker1'>
              <?php if($getUser->due_date_payment != "" ){$val = $getUser->due_date_payment;}else $val= "";?> 
                 <input type="text" class="form-control" id="due_date" name="due_date_payment" value="<?= $val ?>" readonly>
                <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-th"></i></span>
              </div>
             
            </div>
            
             <div class="form-group">
             	<label>Price Index</label>   
                <?php if($getUser->price_index != "" ){$val = $getUser->price_index;}else $val= "";?>               
             	<input id="price_index" name="price_index" type="text" placeholder="" class="form-control" value="<?=$val?>">      
             </div>
                               
              <div class="form-group">
              <label >Payment Type</label>
               <?php if($getUser->payment_type != "" ){$val = $getUser->payment_type;}else $val= "";?>        
                            <select class="form-control" name="payment_type">
                            <option value="<?=$val?>"><?= $val ?></option>
                            <option value="cash">Cash</option>
                            <option value="transfer">transfer</option>
                            </select>
              
               </div>
                               
              <div class="form-group">
              <label>Payment Terms</label>
               <?php if($getUser->payment_terms != "" ){$val = $getUser->payment_terms;}else $val= "";?>  
              <input id="payment_terms" name="payment_terms" type="text" value="<?=$val ?>" class="form-control">Days						
              </div>
                               
               <div class="form-group">
              	<label>Credit Limit</label>
                <?php if($getUser->credit_limit != "" ){$val = $getUser->credit_limit;}else $val= "";?>  
                <input id="credit_limit" name="credit_limit" type="text" value="<?=$val ?>" class="form-control">
               </div>

               <div class="form-group">
              <label>Discount per weight</label>
              <?php if($getUser->discount != "" ){$val = $getUser->discount;}else $val= "";?>  
  					<input id="discount" name="discount" type="text" value="<?= $val?>" class="form-control">
               </div>
            
             <div class="form-group">
              <label >Remark</label>
               <?php if($getUser->remark != "" ){$val = $getUser->remark;}else $val= "";?>  
             	<textarea class="form-control" id="remark" name="remark" placeholder="" rows="5" style="resize:none"><?=$val ?></textarea>
               </div>
            
           
               
                <input type="submit" name="edit" id="submit" value="Edit" class="btn btn-success btn-lg pull-right">
                
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>



<script>



$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

</script>

<link rel="stylesheet" href="<?=base_url() ?>asset/library/select2/select2.css">
<link rel="stylesheet" href="<?=base_url() ?>asset/library/select2/bootstrap-select2.css">

<link rel="stylesheet" href="<?=base_url() ?>asset/library/datepicker/datepicker3.css">
<script type="text/javascript" src="<?=base_url('asset/library/datepicker/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('asset/library/select2/select2.min.js')?>"></script>
<script type="text/javascript">

$('.country').select2();

$(document).ready(function(){
    $('#FILE_NAME, #SHIPPER, #CONSIGNEE').select2();
    $('.input-group.date').datepicker({
        format: "yyyy-m-d",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });
})


var file = '';
var numpage = 1;
$('.find-data').click();
$(document).ready(function(){
    $('#file').change(function(){  file = $(this).val(); })
    $('.find-data').click(function(){ 
        numpage = 1; 
        file = $('#file').val();
        get_data(); 
    })
})



$(document).ready(function() {
  	$('#rootwizard').bootstrapWizard({onTabClick: function(tab, navigation, index) {
		alert('on tab click disabled');
		return false;
	}});
});

</script>
  