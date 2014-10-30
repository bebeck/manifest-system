 
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
                              <label >Country</label>
                              
                               <select class="form-control bfh-states" data-country="US" name="country">
                                 <?php if($getUser->country != "" ){$val = $getUser->country;}else $val= "";?> 
                                 			<option value="<?=$val?>"><?=$val?></option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="AntiguaBarbuda">Antigua &amp; Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="BosniaHerzegovina">Bosnia &amp; Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="BritishIndianOceanTer">British Indian Ocean Ter</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="BurkinaFaso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="CanaryIslands">Canary Islands</option>
                                            <option value="CapeVerd">Cape Verde</option>
                                            <option value="CaymanIslands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Channel Islands">Channel Islands</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Island">Cocos Island</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curacao">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Ter">French Southern Ter</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Great Britain">Great Britain</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hawaii">Hawaii</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="HongKong">HongKong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea North">Korea North</option>
                                            <option value="Korea South">Korea South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Midway Islands">Midway Islands</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nambia">Nambia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherland Antilles">Netherland Antilles</option>
                                            <option value="Netherlands (Holland, Europe)">Netherlands (Holland, Europe)</option>
                                            <option value="Nevis">Nevis</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau Island">Palau Island</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn Islan">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option value="Republic of Serbia">Republic of Serbia</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="St Barthelemy">St Barthelemy</option>
                                            <option value="St Eustatius">St Eustatius</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option value="St Lucia">St Lucia</option>
                                            <option value="St Maarten">St Maarten</option>
                                            <option value="St Pierre Miquelon">St Pierre &amp; Miquelon</option>
                                            <option value="St Vincent Grenadines">St Vincent &amp; Grenadines</option>
                                            <option value="Saipan">Saipan</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa American">Samoa American</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome Principe">Sao Tome &amp; Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tahiti">Tahiti</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad Tobago">Trinidad &amp; Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks Caicos Is">Turks &amp; Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States of America">United States of America</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City State">Vatican City State</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option value="Wake Island">Wake Island</option>
                                            <option value="Wallis Futana Is">Wallis &amp; Futana Is</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zaire">Zaire</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>               
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
                          <option value="<?= $val?>"><?=$val?></option>
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
  