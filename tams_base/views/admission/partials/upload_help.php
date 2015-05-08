<style>
    .modal-help{
        width: 900px;
         margin-left: -500px;
    }
</style>
<!-- Create exam dialog -->
<div 
    class="modal hide fade modal-help" 
    id="utmeupload_help_modal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="basicModal" 
    aria-hidden="true">
    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title" id="myModalLabel">UTME Upload Instruction</h4>
    </div> 
    <div class="modal-body">
        <h6>Step 1: Type UTME List in Excel with the format below </h6>
        <small>
        <table class="table table-condensed table-bordered">
            <thead>
                <tr>
                    <th>Reg. Id</th>
                    <th>first name</th>
                    <th>last name</th>
                    <th>middle name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>Subj 1</th>
                    <th>Score 1</th>
                    <th>Subj 2</th>
                    <th>Score 2</th>
                    <th>Subj 3</th>
                    <th>Score 3</th>
                    <th>Subj 4</th>
                    <th>Score 4</th>
                    <th>Sex</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12345as</td>
                    <td>Dayo</td>
                    <td>Tumishe</td>
                    <td>middle name</td>
                    <td>080xxxx</td>
                    <td>a@t.com</td>
                    <td>1</td>
                    <td>50</td>
                    <td>2</td>
                    <td>80</td>
                    <td>3</td>
                    <td>48</td>
                    <td>4</td>
                    <td>67</td>
                    <td>Male</td>
                </tr>
            </tbody>
        </table>
        </small>
        <br/>
        <h4>Step 2: Choose Save As</h4>
        <img src="<?php echo site_url()?>img/upload_help/2save-as.jpg"/>
        <br/>
        <h4>Step 3: Specify File Name</h4>
        <img src="<?php echo site_url()?>img/upload_help/3file-name.jpg"/>
        <br/>
        <h4>Step 4: Save as CSV Comma Delimiter</h4>
        <img src="<?php echo site_url()?>img/upload_help/4csv-comma-delimited.jpg"/>
        <br/>
        <h4>Step 5: Save on Your Computer</h4>
        <img src="<?php echo site_url()?>img/upload_help/5final-save.jpg"/>
        <br/>
        <h4>Step 6: Open the TAMS Result Upload Page</h4>
        <img src="<?php echo site_url()?>img/upload_help/6upload-page.jpg"/>
        <br/>
        <h4>Step 7: Choose Result File to Upload Result</h4>
        <img src="<?php echo site_url()?>img/upload_help/7choose-file.jpg"/>
        <br/>
        <h4>Step 8: Specify Session, Course & click Upload</h4>
        <img src="<?php echo site_url()?>img/upload_help/8choose-course-to-upload.jpg"/>
    </div>   
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-primary" aria-hidden="true">Ok</button>
    </div>
</div>