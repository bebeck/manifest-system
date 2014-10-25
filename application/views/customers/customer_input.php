<div id="wrapper">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Customer Form
                    </div>
                    <div class="panel-body">
                    
               <form method="post">     
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    
                                   <input id="name" name="name" type="text" placeholder="Please fill name field" class="form-control">
                                 <div style="color: red;"> <?php echo  form_error('name'); ?></div>
                                </div>
                                
                                 <div class="form-group">
                                    <label>Reference Id</label>
                                   <input id="reference_id" name="reference_id" type="text"  class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label>Sort Name</label>
                                   <input id="sort_name" name="sort_name" type="text" placeholder="Please fill sort name field" class="form-control">
                                    <div style="color: red;"> <?php echo  form_error('sort_name'); ?></div>
                                </div>     
                                
                                 <div class="form-group">
                                      <label >E-mail</label>
                                  <input id="email" name="email" type="text" placeholder="please fill email field" class="form-control">
                                </div>
                                
                                  <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" id="address" name="address" placeholder="" rows="5" style="resize:none"></textarea>                             
                                        </div>
                             
                            
                                        
                             <div class="form-group">
                              <label>Phone</label>
                              
                                <input id="phone" name="phone" type="text" placeholder="" class="form-control">
                             
                            </div>
                            
                            
                            
                            
                             <div class="form-group">
                              <label >Mobile</label>
                             
                                <input id="mobile" name="mobile" type="text" placeholder="" class="form-control">
                              
                            </div>
                            <div class="form-group">
                              <label >Fax</label>
                             
                                <input id="fax" name="fax" type="text" class="form-control">
                             
                            </div>
                            
                            <div class="form-group">
                                  <label >Bank Branch</label>
                                  
                                           <input id="bank_branch" name="bank_branch" type="text" placeholder="" class="form-control">      
                                   
                                   </div>
                                   
                                   <div class="form-group">
                                            <label >Bank Code</label>
                                         
                                            <input id="bank_code" name="bank_code" type="text" placeholder="" class="form-control">
                                         </div>     
                             
                            
                            
                               
                                <div class="form-group">
                              <label >Bank Account</label>
                              
                                       <input id="bank_account" name="bank_account" type="text" placeholder="" class="form-control">      
                               
                               </div>
                               
                              <div class="form-group">
                              <label>Price Index</label>
                              
                                       <input id="price_index" name="price_index" type="text" placeholder="" class="form-control">      
                              
                               </div>
                               
                                <div class="form-group">
                              <label >Payment Type</label>
                             
                                            <select class="form-control" name="payment_type">
                                            <option value="cash">Cash</option>
                                            <option value="transfer">transfer</option>
                                            </select>
                              
                               </div>
                               
                              <div class="form-group">
                              <label>Payment Terms</label>
                             
                                     <input id="payment_terms" name="payment_terms" type="text" placeholder="" class="form-control">Days
                               
                               </div>
                               
                               <div class="form-group">
                              <label>Credit Limit</label>
                              
                                     <input id="credit_limit" name="credit_limit" type="text" placeholder="" class="form-control">
                              
                               </div>
                               
                    
                                                                                       
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                  <label>City</label>
                                
                                      <input id="city" name="city" type="text" placeholder=""  class="form-control">
                                      
                                  
                                </div>
            
            
            
            
                              <div class="form-group">
                              <label >Country</label>
                              
                               <select class="form-control bfh-states" data-country="US" name="country">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AG">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AG">Antigua &amp; Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AA">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BL">Bonaire</option>
                                            <option value="BA">Bosnia &amp; Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BR">Brazil</option>
                                            <option value="BC">British Indian Ocean Ter</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="IC">Canary Islands</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CD">Channel Islands</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CI">Christmas Island</option>
                                            <option value="CS">Cocos Island</option>
                                            <option value="CO">Colombia</option>
                                            <option value="CC">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CT">Cote D'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CB">Curacao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="TM">East Timor</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FA">Falkland Islands</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="FS">French Southern Ter</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GB">Great Britain</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HW">Hawaii</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IA">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IR">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="NK">Korea North</option>
                                            <option value="KS">Korea South</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macau</option>
                                            <option value="MK">Macedonia</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="ME">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="MI">Midway Islands</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Nambia</option>
                                            <option value="NU">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="AN">Netherland Antilles</option>
                                            <option value="NL">Netherlands (Holland, Europe)</option>
                                            <option value="NV">Nevis</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NW">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau Island</option>
                                            <option value="PS">Palestine</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PO">Pitcairn Island</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="ME">Republic of Montenegro</option>
                                            <option value="RS">Republic of Serbia</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="NT">St Barthelemy</option>
                                            <option value="EU">St Eustatius</option>
                                            <option value="HE">St Helena</option>
                                            <option value="KN">St Kitts-Nevis</option>
                                            <option value="LC">St Lucia</option>
                                            <option value="MB">St Maarten</option>
                                            <option value="PM">St Pierre &amp; Miquelon</option>
                                            <option value="VC">St Vincent &amp; Grenadines</option>
                                            <option value="SP">Saipan</option>
                                            <option value="SO">Samoa</option>
                                            <option value="AS">Samoa American</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome &amp; Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="OI">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TA">Tahiti</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad &amp; Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TU">Turkmenistan</option>
                                            <option value="TC">Turks &amp; Caicos Is</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States of America</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VS">Vatican City State</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="VB">Virgin Islands (Brit)</option>
                                            <option value="VA">Virgin Islands (USA)</option>
                                            <option value="WK">Wake Island</option>
                                            <option value="WF">Wallis &amp; Futana Is</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZR">Zaire</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>               
                               </select>
                              
                            </div>
                            
                            <div class="form-group">
                              <label >State</label>
                             
                                <input id="state" name="state" type="text" class="form-control">
                             
                            </div>
                            
                            <div class="form-group">
                              <label >Post Code</label>
                             
                                <input id="post_code" name="post_code" type="text" class="form-control">
                             
                            </div>
                            <div class="form-group" style="margin-top:10px;">
                              <label >Contact</label>
                             
                                <input id="contact" name="contact" type="text" placeholder="please fill contact field" class="form-control">
                              <div style="color: red;"> <?php echo  form_error('contact'); ?></div>
                            </div>
                            
                            <div class="form-group" >
                              <label >Other Contact</label>
                             
                                <input id="otcontact" name="otcontact" type="text" placeholder="" class="form-control">
                             
                            </div>
                            
                           
                            
                                                     
                         </div>
                         
                    <div class="col-lg-6">
                    
               
             <div class="form-group" style="margin-top:10px;">
              <label >Tax Class</label>
             
             			  <select class="form-control" name="tax_class" >
                          <option value=""></option>
               				<option value="1">1%</option>
                            <option value="10">10%</option>
                            </select>
                <div style="color: red;"> <?php echo  form_error('tax_class'); ?></div>
                </div>
                
              <div class="form-group">
              <label >VAT Doc</label>
              		
  					<input id="vat_doc" name="vat_doc" type="text" placeholder="" class="form-control">
					
             
               </div>
               
                <div class="form-group">
              <label>Status</label>
              		
  					<input id="status" name="status" type="text" placeholder="" class="form-control">	
               
               </div>
               
                <div class="form-group">
              <label >Register Doc</label>
              		
  					<input id="register_doc" name="register_doc" type="text" placeholder="" class="form-control">	
               
               </div>
               
               <div class="form-group">
              <label >Register Date</label>
              		
  					 <div class='input-group date' id='datetimepicker1'>
                     <input type="text" name="register_date" class="form-control" id="register_date" readonly>
                    <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-th"></i></span>
             
               </div>
               </div>
                
                            
            
            
            <div class="form-group">
              <label>Due Date Payment</label>
           
              <div class='input-group date' id='datetimepicker1'>
                 <input type="text" class="form-control" id="due_date" name="due_date_payment" readonly>
                <span class="input-group-addon datapicker"><i class="glyphicon glyphicon-th"></i></span>
              </div>
             
            </div>
            
            
                <div class="form-group">
              <label>Discount per weight</label>
              		
  					<input id="discount" name="discount" type="text" placeholder="" class="form-control">
               
               </div>
            
             <div class="form-group">
              <label >Remark</label>
              		
  			<textarea class="form-control" id="remark" name="remark" placeholder="" rows="5" style="resize:none"></textarea>
              
               </div>
               
           
                    
                    
                    
                    </div>
                         
                         
                            <div class="col-lg-12">
                            
                            <div class="form-group">
              <label]></label>
            
                    <div class="checkbox">
  						<label><input type="checkbox" value="" name="active_status">Active Status</label>
					</div>
               
               </div>
                               <div class="form-group">
                                  <div class="col-md-12 text-right">
                                  <input type="submit" name="register" value="Register" class="btn btn-primary btn-lg">
                                 
                                  </div>
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
  