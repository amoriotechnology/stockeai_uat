
<style>

    .wagesList form input{
        border: none;
    outline: none;
    border-bottom: 1px solid;
    background: #f9f9f9;

    }

    .wagesList form label {
        margin-right: 6px;

    }

    .w_price2 {
        display: flex;
    }
    .w_price2 li{
        text-align: justify;
    margin-right: 30px;
    }
    h4.instuc_title{
        border-top: 2px solid;
    border-bottom: 2px solid;
    padding: 10px;
    text-align: center;
    color: #000;
    }

    .instruc_bottom2 {
        border-top: 2px solid #444;
    padding-top: 10px;
    }
    .instruc_bottom2 p {
    color: #3c3c3c;
}
section .form_employee{
    display: flex;
    justify-content: space-between;
}
section.content.form-sec {
    min-height: auto;
}

</style>


<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('hrm') ?></h1>

            <small><?php echo $title ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('hrm') ?></a></li>

                <li class="active"><?php echo html_escape($title) ?></li>

            </ol>

        </div>

    </section>

    <section class="content form-sec">

    <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title form_employee">

                            <h2>Add Employee</h2>


                               <a href="<?php echo base_url('Chrm/manage_employee') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Employee </a>


                    <button type="text" class="emply_form_btn btn btn-info m-b-5 m-r-2"> Go To Form </button>
                

                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>




    <section class="content content_instuc" id="instuc_p1"> 

    <!-- form instructions -->

    <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <h4>Form instructions</h4>

                        </div>

                    </div>

                  

                    <div class="panel-body">

                    <div class="instuc_text row">
                        <div class="col-md-6">
                            <h3>General Instruction</h3>
                            <p>Section references are to the Internal Revenue Code.</p>
                            <div class="para-text">
                                <h4>Future Developments</h4>
                                <p>For the latest information about developments related to 
Form W-4, such as legislation enacted after it was published, 
go to www.irs.gov/FormW4</p>
<h4>Purpose of Form</h4>

<p>Complete Form W-4 so that your employer can withhold the 
correct federal income tax from your pay. If too little is 
withheld, you will generally owe tax when you file your tax 
return and may owe a penalty. If too much is withheld, you 
will generally be due a refund. Complete a new Form W-4 
when changes to your personal or financial situation would 
change the entries on the form. For more information on 
withholding and when you must furnish a new Form W-4, 
see Pub. 505, Tax Withholding and Estimated Tax. </p>

<p><strong>Exemption from withholding. </strong>You may claim exemption 
from withholding for 2022 if you meet both of the following 
conditions: you had no federal income tax liability in 2021 
and you expect to have no federal income tax liability in 
2022. You had no federal income tax liability in 2021 if (1) 
your total tax on line 24 on your 2021 Form 1040 or 1040-SR 
is zero (or less than the sum of lines 27a, 28, 29, and 30), or 
(2) you were not required to file a return because your 
income was below the filing threshold for your correct filing 
status. If you claim exemption, you will have no income tax 
withheld from your paycheck and may owe taxes and 
penalties when you file your 2022 tax return. To claim 
exemption from withholding, certify that you meet both of 
the conditions above by writing “Exempt” on Form W-4 in 
the space below Step 4(c). Then, complete Steps 1(a), 1(b), 
and 5. Do not complete any other steps. You will need to 
submit a new Form W-4 by February 15, 2023.</p>

<p></strong>Your privacy.</strong> If you prefer to limit information provided in 
Steps 2 through 4, use the online estimator, which will also 
increase accuracy.</p>

<p>As an alternative to the estimator: if you have concerns 
with Step 2(c), you may choose Step 2(b); if you have 
concerns with Step 4(a), you may enter an additional amount 
you want withheld per pay period in Step 4(c). If this is the 
only job in your household, you may instead check the box 
in Step 2(c), which will increase your withholding and 
significantly reduce your paycheck (often by thousands of 
dollars over the year).</p>


<p><strong>When to use the estimator.</strong> Consider using the estimator at
www.irs.gov/W4App if you:</p>

<ol>
    <li> Expect to work only part of the year;</li>
    <li>Have dividend or capital gain income, or are subject to 
additional taxes, such as Additional Medicare Tax;</li>
    <li> Have self-employment income (see below); or</li>
    <li>Prefer the most accurate withholding for multiple job 
situations</li>
</ol>

<p><strong>Self-employment. </strong>Generally, you will owe both income and 
self-employment taxes on any self-employment income you 
receive separate from the wages you receive as an 
employee. If you want to pay these taxes through 
withholding from your wages, use the estimator at 
www.irs.gov/W4App to figure the amount to have withheld.</p>

<p><strong>Nonresident alien.</strong> If you’re a nonresident alien, see Notice 
1392, Supplemental Form W-4 Instructions for Nonresident 
Aliens, before completing this form.</p>
                            </div>

                        </div>



                        <div class="col-md-6">
                            <h3>Specific Instructions</h3>
                            <div class="para-text">

<p><strong>Step 1(c). </strong>Check your anticipated filing status. This will 
determine the standard deduction and tax rates used to 
compute your withholding.</p>

<p></strong>Step 2.</strong> Use this step if you (1) have more than one job at the 
same time, or (2) are married filing jointly and you and your 
spouse both work.</p>

<p>Option <b>(a)</b> most accurately calculates the additional tax 
you need to have withheld, while option <b>(b)</b> does so with a 
little less accuracy. </p>


<p>If you (and your spouse) have a total of only two jobs, you 
may instead check the box in option (c). The box must also 
be checked on the Form W-4 for the other job. If the box is 
checked, the standard deduction and tax brackets will be 
cut in half for each job to calculate withholding. This option 
is roughly accurate for jobs with similar pay; otherwise, more 
tax than necessary may be withheld, and this extra amount 
will be larger the greater the difference in pay is between the 
two jobs</p>

<img src="" alt="">
   <p><strong>Multiple jobs.</strong> Complete Steps 3 through 4(b) on only 
one Form W-4. Withholding will be most accurate if 
you do this on the Form W-4 for the highest paying job.</p>

<p><strong>Step 3.</strong> This step provides instructions for determining the 
amount of the child tax credit and the credit for other 
dependents that you may be able to claim when you file your 
tax return. To qualify for the child tax credit, the child must 
be under age 17 as of December 31, must be your 
dependent who generally lives with you for more than half 
the year, and must have the required social security number. 
You may be able to claim a credit for other dependents for 
whom a child tax credit can’t be claimed, such as an older 
child or a qualifying relative. For additional eligibility 
requirements for these credits, see Pub. 501, Dependents, 
Standard Deduction, and Filing Information. You can also 
include other tax credits for which you are eligible in this 
step, such as the foreign tax credit and the education tax 
credits. To do so, add an estimate of the amount for the year 
to your credits for dependents and enter the total amount in 
Step 3. Including these credits will increase your paycheck 
and reduce the amount of any refund you may receive when 
you file your tax return.</p>

<strong>Step 4 (optional).</strong>

<p><strong>Step 4(a).</strong> Enter in this step the total of your other 
estimated income for the year, if any. You shouldn’t include 
income from any jobs or self-employment. If you complete 
Step 4(a), you likely won’t have to make estimated tax 
payments for that income. If you prefer to pay estimated tax 
rather than having tax on other income withheld from your 
paycheck, see Form 1040-ES, Estimated Tax for Individuals.</p>

<p></strong>Step 4(b). </strong>Enter in this step the amount from the 
Deductions Worksheet, line 5, if you expect to claim 
deductions other than the basic standard deduction on your 
2022 tax return and want to reduce your withholding to 
account for these deductions. This includes both itemized 
deductions and other deductions such as for student loan 
interest and IRAs</p>

<p><strong>Step 4(c). </strong>Enter in this step any additional tax you want 
withheld from your pay each pay period, including any 
amounts from the Multiple Jobs Worksheet, line 4. Entering 
an amount here will reduce your paycheck and will either 
increase your refund or reduce any amount of tax that you 
owe</p>
                            </div>

                            <div class="nxtBtn text-right"><button type="text" class="next_pg btn btn-success w-md m-b-5">Next</button></div>

                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>


    </section>



    <section class="content content_instuc" id="instuc_p2">

<!-- form instructions -->

<div class="row">

        <div class="col-sm-12">

            <div class="panel panel-bd lobidrag">

                <!-- <div class="panel-heading">

                    <div class="panel-title">

                        <h4>Form instructions</h4>

                    </div>

                </div> -->

              

                <div class="panel-body">

                <h4 class="instuc_title">Step 2(b)—Multiple Jobs Worksheet<span> (Keep for your records.)</span></h4>

                <div class="instru-text">
                    <p>If you choose the option in Step 2(b) on Form W-4, complete this worksheet (which calculates the total extra tax for all jobs) on only ONE
Form W-4. Withholding will be most accurate if you complete the worksheet and enter the result on the Form W-4 for the highest paying job</p>

<p><strong>Note: </strong>If more than one job has annual wages of more than $120,000 or there are more than three jobs, see Pub. 505 for additional 
tables; or, you can use the online withholding estimator at www.irs.gov/W4App.</p>


<div class="wagesList">
    <ol>

    <div class="w_price2">
        <li>Two jobs. If you have two jobs or you’re married filing jointly and you and your spouse each have one
job, find the amount from the appropriate table on page 4. Using the “Higher Paying Job” row and the
“Lower Paying Job” column, find the value at the intersection of the two household salaries and enter 
that value on line 1. Then, skip to line 3 . . . . . . . . . . . . . . . . . . . . .</li>
<form>
  <label for="price">1</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>

<li>Three jobs. If you and/or your spouse have three jobs at the same time, complete lines 2a, 2b, and 
2c below. Otherwise, skip to line 3.</li>
<br>



<ol type="a">
<div class="w_price2">
    <li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
  <label for="price">2a</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
    <li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
  <label for="price">2b</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
    <li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
  <label for="price">2c</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
</ol>

<div class="w_price2">
    <li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
  <label for="price">3</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
    <li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
  <label for="price">4</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
    </ol>
   
   
    
</div>
                </div>
                </div>




                <div class="panel-body">

                <h4 class="instuc_title">Step 4(b)—Deductions Worksheet<span> (Keep for your records.)</span></h4>

                <div class="instru-text">

<div class="wagesList">
    <ol>

    <div class="w_price2">
        <li>Enter an estimate of your 2022 itemized deductions (from Schedule A (Form 1040)). Such deductions
may include qualifying home mortgage interest, charitable contributions, state and local taxes (up to 
$10,000), and medical expenses in excess of 7.5% of your income . . . . . . . . . . . . </li>
<form>
  <label for="price">1</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>

<div class="w_price2">
    <li>If line 1 is greater than line 2, subtract line 2 from line 1 and enter the result here. If line 2 is greater 
than line 1, enter “-0-” . . . . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
  <label for="price">2</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
    <li>Enter an estimate of your student loan interest, deductible IRA contributions, and certain other 
adjustments (from Part II of Schedule 1 (Form 1040)). See Pub. 505 for more information . . . . </li>
<form>
  <label for="price">3</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
    <li>Add lines 3 and 4. Enter the result here and in Step 4(b) of Form W-4 . . . . . . . . . . .</li>
<form>
  <label for="price">4</label>
  <input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
    </ol>
   
   
    
</div>
                </div>

                <div class="instruc_bottom2">
                    <div class="col-md-6">
                        <p><strong>Privacy Act and Paperwork Reduction Act Notice.</strong> We ask for the information 
on this form to carry out the Internal Revenue laws of the United States. Internal 
Revenue Code sections 3402(f)(2) and 6109 and their regulations require you to 
provide this information; your employer uses it to determine your federal income 
tax withholding. Failure to provide a properly completed form will result in your 
being treated as a single person with no other entries on the form; providing 
fraudulent information may subject you to penalties. Routine uses of this 
information include giving it to the Department of Justice for civil and criminal 
litigation; to cities, states, the District of Columbia, and U.S. commonwealths and 
possessions for use in administering their tax laws; and to the Department of 
Health and Human Services for use in the National Directory of New Hires. We 
may also disclose this information to other countries under a tax treaty, to federal 
and state agencies to enforce federal nontax criminal laws, or to federal law 
enforcement and intelligence agencies to combat terrorism.</p>
                    </div>
                    <div class="col-md-6">
                        <p>You are not required to provide the information requested on a form that is 
subject to the Paperwork Reduction Act unless the form displays a valid OMB 
control number. Books or records relating to a form or its instructions must be 
retained as long as their contents may become material in the administration of 
any Internal Revenue law. Generally, tax returns and return information are 
confidential, as required by Code section 6103.</p> 
<p>The average time and expenses required to complete and file this form will vary 
depending on individual circumstances. For estimated averages, see the 
instructions for your income tax return.</p>
<p>If you have suggestions for making this form simpler, we would be happy to hear 
from you. See the instructions for your income tax return.</p>
                    </div>
                </div>
                </div>

               


                </div>
                </div>
                </div>

</section>



    <section class="content emply_form">

        <!-- Alert Message -->

        <?php

        $message = $this->session->userdata('message');

        if (isset($message)) {

            ?>

            <div class="alert alert-info alert-dismissable">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('message');

        }

        $error_message = $this->session->userdata('error_message');

        if (isset($error_message)) {

            ?>

            <div class="alert alert-danger alert-dismissable">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $error_message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('error_message');

        }

        ?>



        <!-- New Employee Type -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <h4><?php echo html_escape($title) ?> </h4>

                        </div>

                    </div>

                  

                    <div class="panel-body">



                         <?php echo form_open_multipart('Chrm/employee_create','id="validate"', ) ?>

                    <div class="form-group row">

                        <label for="first_name" class="col-sm-2 col-form-div"><?php echo display('first_name') ?> <i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <input name="first_name" class="form-control" type="text" placeholder="<?php echo display('first_name') ?>" required id="first_name">

                        </div>

                         <label for="last_name" class="col-sm-2 col-form-div"><?php echo display('last_name') ?><i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <input name="last_name" class="form-control" type="text" placeholder="<?php echo display('last_name') ?>" required id="last_name">

                        </div>

                    </div>

                    <div class="form-group row">

                        <label for="designation" class="col-sm-2 col-form-div"><?php echo display('designation') ?> <i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <?php echo form_dropdown('designation',$desig,null,'class="form-control" required') ?>

                        </div>

                         <label for="phone" class="col-sm-2 col-form-div"><?php echo display('phone') ?> <i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <input name="phone" class="form-control" type="number" placeholder="<?php echo display('phone') ?>" id="phone" required>

                        </div>

                    </div>

                    <div class="form-group row">

                        <label for="rate_type" class="col-sm-2 col-form-div">Payment Type</label>

                        <div class="col-sm-4">

                          <select name="rate_type" class="form-control">

                              <option value="">Select type</option>

                              <option value="0">Daily</option>

                              <option value="1">Weekly</option>

                              <option value="2">Monthly</option>

                          </select>

                        </div>

                         <label for="hour_rate_or_salary" class="col-sm-2 col-form-div">Per hour cost  <i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <input name="hrate" class="form-control" type="number" placeholder="<?php echo display('hour_rate_or_salary') ?>" id="hrate" required>

                        </div>

                         

                    </div>

                    <div class="form-group row">

                        <label for="email" class="col-sm-2 col-form-div"><?php echo display('email') ?></label>

                        <div class="col-sm-4">

                            <input name="email" class="form-control" type="email" placeholder="<?php echo display('email') ?>" id="email">

                        </div>

                         <label for="blood_group" class="col-sm-2 col-form-div"><?php echo display('blood_group') ?> </label>

                        <div class="col-sm-4">

                            <input name="blood_group" class="form-control" type="text" placeholder="<?php echo display('blood_group') ?>" id="blood_group">

                        </div>

                         

                    </div>

                     <div class="form-group row">

                        <label for="email" class="col-sm-2 col-form-div">Social security number</label>

                        <div class="col-sm-4">

                            <input name="ssn" class="form-control" type="text" placeholder="Social security number">

                        </div>

                         <label for="blood_group" class="col-sm-2 col-form-div">Routing number </label>

                        <div class="col-sm-4">

                            <input name="routing_number" class="form-control" type="text" placeholder="Routing number">

                        </div>

                         

                    </div>


                     <div class="form-group row">

                    <label for="address_line_1" class="col-sm-2 col-form-div"><?php echo display('address_line_1') ?></label>

                        <div class="col-sm-4">

                           <textarea name="address_line_1" class="form-control" placeholder="<?php echo display('address_line_1') ?>" id="address_line_1"></textarea> 

                        </div>

                       <label for="address_line_2" class="col-sm-2 col-form-div"><?php echo display('address_line_2') ?></label>

                        <div class="col-sm-4">

                           <textarea name="address_line_2" class="form-control" placeholder="<?php echo display('address_line_2') ?>" id="address_line_2"></textarea> 

                        </div>

                        

                    </div>

                    <div class="form-group row">

                         <label for="picture" class="col-sm-2 col-form-div">Image</label>

                        <div class="col-sm-4">

                            <input type="file" name="image" class="form-control"  placeholder="<?php echo display('picture') ?>" id="image">

                        </div>



                    <!-- <label for="picture" class="col-sm-2 col-form-div"><?php echo display('picture') ?></label>

                        <div class="col-sm-4">

                            <input type="file" name="image" class="form-control"  placeholder="<?php echo display('picture') ?>" id="image">

                        </div> -->

                        <label for="country" class="col-sm-2 col-form-div"><?php echo display('country') ?> </label>

                        <div class="col-sm-4">

                          <select name="country" class="form-control">

                <option value="">Select Country</option>

                <option value="Afganistan" rel="">Afghanistan</option>

                <option value="Albania" rel="">Albania</option>

                <option value="Algeria" rel="">Algeria</option>

                <option value="American Samoa" rel="">American Samoa</option>

                <option value="Andorra" rel="">Andorra</option>

                <option value="Angola" rel="">Angola</option>

                <option value="Anguilla" rel="">Anguilla</option>

                <option value="Antigua &amp; Barbuda" rel="">Antigua &amp; Barbuda</option>

                <option value="Argentina" rel="">Argentina</option>

                <option value="Armenia" rel="">Armenia</option>

                <option value="Aruba" rel="">Aruba</option>

                <option value="Australia" rel="">Australia</option> 

                <option value="Austria" rel="">Austria</option>

                <option value="Azerbaijan" rel="">Azerbaijan</option>

                <option value="Bahamas" rel="">Bahamas</option>

                <option value="Bahrain" rel="">Bahrain</option>

                <option value="Bangladesh" rel="">Bangladesh</option>

                <option value="Barbados" rel="">Barbados</option>

                <option value="Belarus" rel="">Belarus</option>

                <option value="Belgium" rel="">Belgium</option>

                <option value="Belize" rel="">Belize</option>

                <option value="Benin" rel="">Benin</option>

                <option value="Bermuda" rel="">Bermuda</option>

                <option value="Bhutan" rel="">Bhutan</option>

                <option value="Bolivia" rel="">Bolivia</option>

                <option value="Bonaire" rel="">Bonaire</option>

                <option value="Bosnia &amp; Herzegovina" rel="">Bosnia &amp; Herzegovina</option>

                <option value="Botswana" rel="">Botswana</option>

                <option value="Brazil" rel="">Brazil</option>

                <option value="British Indian Ocean Ter" rel="">British Indian Ocean Ter</option>

                <option value="Brunei" rel="">Brunei</option>

                <option value="Bulgaria" rel="">Bulgaria</option>

                <option value="Burkina Faso" rel="">Burkina Faso</option>

                <option value="Burundi" rel="">Burundi</option>

                <option value="Cambodia" rel="">Cambodia</option>

                <option value="Cameroon" rel="">Cameroon</option>

                <option value="Canada" rel="">Canada</option>

                <option value="Canary Islands" rel="">Canary Islands</option>

                <option value="Cape Verde" rel="">Cape Verde</option>

                <option value="Cayman Islands" rel="">Cayman Islands</option>

                <option value="Central African Republic" rel="">Central African Republic</option>

                <option value="Chad" rel="">Chad</option>

                <option value="Channel Islands" rel="">Channel Islands</option>

                <option value="Chile" rel="">Chile</option>

                <option value="China" rel="">China</option>

                <option value="Christmas Island" rel="">Christmas Island</option>

                <option value="Cocos Island" rel="">Cocos Island</option>

                <option value="Colombia" rel="">Colombia</option>

                <option value="Comoros" rel="">Comoros</option>

                <option value="Congo" rel="">Congo</option>

                <option value="Cook Islands" rel="">Cook Islands</option>

                <option value="Costa Rica" rel="">Costa Rica</option>

                <option value="Cote DIvoire" rel="">Cote D'Ivoire</option>

                <option value="Croatia" rel="">Croatia</option>

                <option value="Cuba" rel="">Cuba</option>

                <option value="Curaco" rel="">Curacao</option>

                <option value="Cyprus" rel="">Cyprus</option>

                <option value="Czech Republic" rel="">Czech Republic</option>

                <option value="Denmark" rel="">Denmark</option>

                <option value="Djibouti" rel="">Djibouti</option>

                <option value="Dominica" rel="">Dominica</option>

                <option value="Dominican Republic" rel="">Dominican Republic</option>

                <option value="East Timor" rel="">East Timor</option>

                <option value="Ecuador" rel="">Ecuador</option>

                <option value="Egypt" rel="">Egypt</option>

                <option value="El Salvador" rel="">El Salvador</option>

                <option value="Equatorial Guinea" rel="">Equatorial Guinea</option>

                <option value="Eritrea" rel="">Eritrea</option>

                <option value="Estonia" rel="">Estonia</option>

                <option value="Ethiopia" rel="">Ethiopia</option>

                <option value="Falkland Islands" rel="">Falkland Islands</option>

                <option value="Faroe Islands" rel="">Faroe Islands</option>

                <option value="Fiji" rel="">Fiji</option>

                <option value="Finland" rel="">Finland</option>

                <option value="France" rel="">France</option>

                <option value="French Guiana" rel="">French Guiana</option>

                <option value="French Polynesia" rel="">French Polynesia</option>

                <option value="French Southern Ter">French Southern Ter</option>

                <option value="Gabon">Gabon</option>

                <option value="Gambia">Gambia</option>

                <option value="Georgia">Georgia</option>

                <option value="Germany" rel="">Germany</option>

                <option value="Ghana">Ghana</option>

                <option value="Gibraltar">Gibraltar</option>

                <option value="Great Britain">Great Britain</option>

                <option value="Greece" rel="">Greece</option>

                <option value="Greenland" rel="">Greenland</option>

                <option value="Grenada">Grenada</option>

                <option value="Guadeloupe">Guadeloupe</option>

                <option value="Guam">Guam</option>

                <option value="Guatemala">Guatemala</option>

                <option value="Guinea">Guinea</option>

                <option value="Guyana">Guyana</option>

                <option value="Haiti">Haiti</option>

                <option value="Hawaii">Hawaii</option>

                <option value="Honduras">Honduras</option>

                <option value="Hong Kong" rel="">Hong Kong</option>

                <option value="Hungary">Hungary</option>

                <option value="Iceland">Iceland</option>

                <option value="India" rel="">India</option>

                <option value="Indonesia" rel="">Indonesia</option>

                <option value="Iran" rel="">Iran</option>

                <option value="Iraq" rel="">Iraq</option>

                <option value="Ireland" rel="">Ireland</option>

                <option value="Isle of Man">Isle of Man</option>

                <option value="Israel">Israel</option>

                <option value="Italy" rel="">Italy</option>

                <option value="Jamaica">Jamaica</option>

                <option value="Japan" rel="">Japan</option>

                <option value="Jordan">Jordan</option>

                <option value="Kazakhstan">Kazakhstan</option>

                <option value="Kenya" rel="">Kenya</option>

                <option value="Kiribati">Kiribati</option>

                <option value="Korea North" rel="">Korea North</option>

                <option value="Korea Sout" rel="">Korea South</option>

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

                <option value="Netherlands">Netherlands (Holland, Europe)</option>

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

                <option value="Phillipines" rel="">Philippines</option>

                <option value="Pitcairn Island">Pitcairn Island</option>

                <option value="Poland">Poland</option>

                <option value="Portugal">Portugal</option>

                <option value="Puerto Rico">Puerto Rico</option>

                <option value="Qatar" rel="">Qatar</option>

                <option value="Republic of Montenegro">Republic of Montenegro</option>

                <option value="Republic of Serbia" rel="">Republic of Serbia</option>

                <option value="Reunion">Reunion</option>

                <option value="Romania">Romania</option>

                <option value="Russia" rel="">Russia</option>

                <option value="Rwanda">Rwanda</option>

                <option value="St Barthelemy">St Barthelemy</option>

                <option value="St Eustatius">St Eustatius</option>

                <option value="St Helena">St Helena</option>

                <option value="St Kitts-Nevis">St Kitts-Nevis</option>

                <option value="St Lucia">St Lucia</option>

                <option value="St Maarten">St Maarten</option>

                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>

                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>

                <option value="Saipan">Saipan</option>

                <option value="Samoa">Samoa</option>

                <option value="Samoa American">Samoa American</option>

                <option value="San Marino">San Marino</option>

                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>

                <option value="Saudi Arabia">Saudi Arabia</option>

                <option value="Senegal">Senegal</option>

                <option value="Serbia">Serbia</option>

                <option value="Seychelles">Seychelles</option>

                <option value="Sierra Leone">Sierra Leone</option>

                <option value="Singapore" rel="">Singapore</option>

                <option value="Slovakia">Slovakia</option>

                <option value="Slovenia">Slovenia</option>

                <option value="Solomon Islands">Solomon Islands</option>

                <option value="Somalia">Somalia</option>

                <option value="South Africa" rel="">South Africa</option>

                <option value="Spain">Spain</option>

                <option value="Sri Lanka" rel="">Sri Lanka</option>

                <option value="Sudan">Sudan</option>

                <option value="Suriname">Suriname</option>

                <option value="Swaziland">Swaziland</option>

                <option value="Sweden" rel="">Sweden</option>

                <option value="Switzerland">Switzerland</option>

                <option value="Syria">Syria</option>

                <option value="Tahiti">Tahiti</option>

                <option value="Taiwan">Taiwan</option>

                <option value="Tajikistan">Tajikistan</option>

                <option value="Tanzania">Tanzania</option>

                <option value="Thailand" rel="">Thailand</option>

                <option value="Togo">Togo</option>

                <option value="Tokelau">Tokelau</option>

                <option value="Tonga">Tonga</option>

                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>

                <option value="Tunisia">Tunisia</option>

                <option value="Turkey">Turkey</option>

                <option value="Turkmenistan">Turkmenistan</option>

                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>

                <option value="Tuvalu">Tuvalu</option>

                <option value="Uganda">Uganda</option>

                <option value="Ukraine">Ukraine</option>

                <option value="United Arab Erimates" rel="">United Arab Emirates</option>

                <option value="United Kingdom" rel="">United Kingdom</option>

                <option value="United States of America" rel="">United States of America</option>

                <option value="Uraguay">Uruguay</option>

                <option value="Uzbekistan">Uzbekistan</option>

                <option value="Vanuatu">Vanuatu</option>

                <option value="Vatican City State" rel="">Vatican City State</option>

                <option value="Venezuela">Venezuela</option>

                <option value="Vietnam">Vietnam</option>

                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>

                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>

                <option value="Wake Island">Wake Island</option>

                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>

                <option value="Yemen" rel="">Yemen</option>

                <option value="Zaire">Zaire</option>

                <option value="Zambia">Zambia</option>

                <option value="Zimbabwe">Zimbabwe</option>

                            </select>

                        </div>

                         

                    </div>

                 

                <div class="form-group row">

                 <label for="city" class="col-sm-2 col-form-div"><?php echo display('city') ?></label>

                        <div class="col-sm-4">

                            <input name="city" class="form-control" type="text" placeholder="<?php echo display('city') ?>" id="city">

                            

                        </div>

                     <label for="zip" class="col-sm-2 col-form-div"><?php echo display('zip') ?></label>

                        <div class="col-sm-4">

                            <input name="zip" class="form-control" type="text" placeholder="<?php echo display('zip') ?>" id="zip">

                        </div>

                 </div>

                    



                    <div class="form-group text-right">

                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>

                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>

                    </div>

                <?php echo form_close() ?>

                    </div>

                

                </div>

            </div>

        </div>

    </section>


</div>

<script>

    $(function() {  
        $("#instuc_p2").hide();
        $(".emply_form").hide();
        
        $(".next_pg").click(function(){  
        $("#instuc_p2").show();
        $("#instuc_p1").hide();
    });  

    $(".emply_form_btn").click(function(){
        $(".emply_form").show();
        $("#instuc_p2").hide();
        $("#instuc_p1").hide();
        

    })
});  
</script>



