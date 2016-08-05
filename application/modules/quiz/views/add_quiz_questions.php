<?php $this->load->model('department/Degree_model');
 $this->load->model('branch/Course_model');
  $this->load->model('batch/Batch_model');
   $this->load->model('semester/Semester_model');
   $this->load->model('subject/Subject_manager_model');
   
?>
<!-- Start .row -->
<div class=row>                      

    <div class=col-lg-12>
        <!-- col-lg-12 start here -->
        <div class="panel-default">
            <div class="panel-heading">
                <div class="panel-title">Quiz Details</div>
            </div>
            <div class=panel-body>               
                <table class="table table-bordered">
                    <tr>
                        <td><strong>Title</strong></td>
                        <td><?php echo $quiz->title; ?></td>
                        <td><strong>Description</strong></td>
                        <td><?php echo $quiz->description; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Department</strong></td>
                        <td><?php if($quiz->department_id!="All"){
                        $name = $this->Degree_model->get($quiz->department_id);
                            echo $name->d_name;
                            
                        }else{ echo "All"; } ?></td>
                        <td><strong>Branch</strong></td>
                        <td><?php if($quiz->branch_id!="All")
                        { 
                            $course = $this->Course_model->get($quiz->branch_id);
                            echo $course->c_name;
                        }else{
                            echo "All";
                        }    
                        
                            ?></td>
                    </tr>
                    <tr>
                        <td><strong>Batch</strong></td>
                        <td><?php if($quiz->batch_id!="All"){
                            $batch = $this->Batch_model->get($quiz->batch_id);
                           echo $batch->b_name;
                        }else{
                            echo "All"; 
                        }
                            ?></td>
                        
                        <td><strong>Semester</strong></td>
                        <td><?php if($quiz->semester_id!="All")
                            {
                            $semester = $this->Semester_model->get($quiz->semester_id);
                            echo $semester->s_name;
                            }
                            else{
                                echo "All";
                            }
                            ?></td>
                        <td><strong>Subject</strong></td>
                         <td><?php
                         if($quiz->sm_id!="")
                         {
                         if($quiz->sm_id!="All")
                            {
                            $subject = $this->Subject_manager_model->get($quiz->sm_id);
                            echo $subject->subject_name;
                            }
                            else{
                                echo "All";
                            }
                         }
                            ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
    <form class="form-horizontal form-groups-bordered validate" method="post" id="quiz-question-option">
        <div class="col-lg-12">
            <div class="col-lg-8">
                <div class="panel-default">
                    <?php if($this->session->userdata('error_message')){ ?>
                    <div class="panel-heading">
                        <div class="danger" style="color:red"><?php echo $this->session->userdata('error_message'); ?></div>
                    </div>
                    <?php } ?>
                    <div class="panel-heading">
                        <div class="panel-title">Questions</div>
                    </div>

                    <div class="panel-body">
                        <?php for ($i = 1; $i <= $quiz->total_questions; $i++) { ?>
                            <div id="panel<?php echo $i; ?>" class="question inactive"  question_no="<?php echo $i; ?>">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("question"); ?><span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ques" name="question_<?php echo $i; ?>" id="question_<?php echo $i; ?>" class="question_number" value="" />
                                        <label id="question_<?php echo $i; ?>-error" class="error" for="question_<?php echo $i; ?>"></label>
                                    </div>
                                    
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("question type"); ?><span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control questype" name="question_type_<?php echo $i; ?>" id="question_type_<?php echo $i; ?>" id="question_type_<?php echo $i; ?>" > 
                                           <option value="SingleAnswer">Single Answer</option>
                                            <option value="MultiAnswer">Multiple Answer</option>
                                        </select>
                                        <label id="error_question_type_<?php echo $i; ?>" style="text-align: center"></label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("option1"); ?><span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control ques1" name="question_<?php echo $i; ?>_option_1" id="question_<?php echo $i; ?>_option_1" value="" />
                                        <label id="question_<?php echo $i; ?>_option_1-error" class="error" for="question_<?php echo $i; ?>_option_1"></label>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("option2"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="question_<?php echo $i; ?>_option_2" value=""/>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("option3"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="question_<?php echo $i; ?>_option_3" value=""/>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("option4"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="question_<?php echo $i; ?>_option_4" value=""/>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("option5"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="question_<?php echo $i; ?>_option_5" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("option6"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="question_<?php echo $i; ?>_option_6" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("answer"); ?><span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control answervalidation" name="question_<?php echo $i; ?>_answer" 
                                               placeholder="Only enter option number" id="question_<?php echo $i; ?>_answer"  />
                                        <label id="question_<?php echo $i; ?>_answer-error" class="error" for="question_<?php echo $i; ?>_answer"></label>
                                    </div>
                                    <label class="col-sm-4 "></label>
                                    <div class="col-sm-8">
                                        <span style="font-size: 10px;"> <strong style="color:red">Note :</strong> If you choose question type is Multiple Answer then answer enter like 1,2,3 </span>
                                    </div>
                                </div> 
                                
                            </div>
                        <?php } ?>
                        <div class="next-prev">
                            <a id="prev" style="float: left" class="btn btn-primary">Prev</a>
                            <a id="next" style="float: right" class="btn btn-primary">Next</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Question No</div>
                    </div>
                    <div>
                        <div class="panel-body">
                            <?php for ($i = 1; $i <= $quiz->total_questions; $i++) { ?>
                                <div class="col-lg-1 number-margin">
                                    <a id="anchor-number-<?php echo $i; ?>" class="btn btn-primary page-number"
                                       data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
                                </div>
                            <?php } ?>                        
                        </div>
                        <div class="col-lg-4">
                            <input type="submit" class="btn btn-success" id="submit" value="Submit"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End .row -->
</div>
<!-- End contentwrapper -->
</div>

<style>
    .number-margin{
        margin-right: 30px; margin-bottom: 5px;
    }

    .page-number{
        width: 50px;
    }

    .inactive {
        display: none;
    }
</style>
<script>
    
    $( "#submit" ).click(function() {
//        $("#quiz-question-option").validate(
//            {
//              ignore: [],
//           });
           $(".ques").each(function(){
               //alert($(this).attr('id'));
                    $(this).rules("add", {
                           required: true,
                            messages: {
                                 required: "Enter question",
                             }
                     });
                });
           
               $(".questype").each(function(){
               $(this).rules("add", {
                    required: true,
                     messages: {
                          required: "Select question type",
                          }
                  });
               });
             $(".ques1").each(function(){
               
               //alert($(this).attr('id'));
               $(this).rules("add", {
                      required: true,
                       messages: {
                            required: "Enter answer option",
                        }
                });
           });
           
        $('.answervalidation').each(function () {
            var id=$(this).attr('id');
            var idarray= id.split('_');
            var question_type=$('#question_type_'+idarray[1]).val();
     
                $(this).rules("add", {
                  
                    required: true,
                     merge:question_type,
                        messages: {
                            required: "Enter answer",
                        }
                    });
                });
              
              //$("#quiz-question-option").validate();
//              if($("#quiz-question-option").valid()==false)
//              {
//                  alert("Please enter valid question value");
//              }
               return $("#quiz-question-option").valid();
    });
</script>
<script>

    $(document).ready(function () {
        
         $.validator.addMethod("length", function(value, element) {
                    return this.optional(element) || /^[1-6]{1}$/i.test(value);
                }, "Enter valid answer number");
    
            $.validator.addMethod("multipleanslength", function(value, element) {
                    return this.optional(element) || /^[1-6](,[1-6])*$/i.test(value);
                }, "Enter valid multiple answer");
            
            $.validator.addMethod("merge", function(value, element, param) {
                    if(param=="MultiAnswer")
                    {
                        return this.optional(element) || /^[1-6](,[1-6])*$/i.test(value);
                    }
                    else
                    {
                        return this.optional(element) || /^[1-6]{1}$/i.test(value);
                    }
              }, "Enter valid answer");
              
         var validator = $("#quiz-question-option").validate(
            {
              ignore: [],
      
               invalidHandler: function() {
                   alert(validator.numberOfInvalids() + " field(s) are invalid");
                   $(this).find(":input.error:first").focus();
                  }
           });
           
            $(".answervalidation").each(function(){
                    var id=$(this).attr('id');
                    var idarray= id.split('_');
                    var question_type=$('#question_type_'+idarray[1]).val();
                       
                        $(this).rules("add", {
                               required: true,
                               merge:question_type,
                                messages: {
                                     required: "Enter answer",
                                     }
                             });
               });
           
            $(".ques").each(function(){
               
               //alert($(this).attr('id'));
               $(this).rules("add", {
                    required: true,
                     messages: {
                          required: "Enter question",
                          }
                  });
               });
               
               
               $(".questype").each(function(){
               
               $(this).rules("add", {
                    required: true,
                     messages: {
                          required: "Select question type",
                          }
                  });
               });
               
             $(".ques1").each(function(){
               
               $(this).rules("add", {
                      required: true,
                       messages: {
                            required: "Enter answer option",
                            }
                    });
               });
               
     
           $("#quiz-question-option").validate();
        
        var counter = 1;
        var max = <?php echo $quiz->total_questions; ?>;
        var min = 0;

        $('#panel1').removeClass('inactive');
        $('#anchor-number-1').addClass('btn-info');
            $(".questype").change(function(){
             
                if($(this).val()!= "")
                {
                     var id=$(this).attr('id');
                     var idarray= id.split('_');
                
                   var question_type=$(this).val();
                   $("#question_"+idarray[2]+"_answer").rules("add", {
                             merge:question_type,
                 });
                    
                }
                
            });
            
           $(".answervalidation").change(function(){
               
                    var id=$(this).attr('id');
                    var idarray= id.split('_');
                    var question_type=$('#question_type_'+idarray[1]).val();
                    
                $(this).rules("add", {
                    merge:question_type,
                 });
        });
        
        $("#next").click(function () {   
            
            if (counter <= max) {
                var minus = 1;
                var mycounter = counter;
              if($("#question_"+mycounter).valid()==false 
                      || $("#question_type_"+mycounter).valid()== false
                      || $("#question_"+mycounter+"_option_1").valid()==false
                      || $("#question_"+mycounter+"_answer").valid()==false )
                        {
                          return false;
                        }
            }            
            next();
        });
        
        
        function next() {
            if (max > counter)
                counter++;
            if (counter <= max) {
               
                $('.question').addClass('inactive');
                $('#panel' + counter).removeClass('inactive');
                hide_all();
                $('#panel' + counter + ' input').focus();
                 
               // $('.inactive').css('display', 'none');
                
                $('#panel' + counter).show('slide', {
                    direction: 'right'
                }, 1000);
                current_active_question_number(counter);
            }            
           
        }
        $('#prev').click(function () {
              var minus = 1;
                var mycounter = counter;
                
                 if($("#question_"+mycounter).valid()==false 
                      || $("#question_type_"+mycounter).valid()== false
                      || $("#question_"+mycounter+"_option_1").valid()==false
                      || $("#question_"+mycounter+"_answer").valid()==false )
                    {
                      return false;
                    }
                
            prev();
        });
        function prev() {
            if (counter > 1)
                counter--;
            if (counter > 0) {
                var minus = 1;
                var mycounter = counter+1;
                
                $('.question').addClass('inactive');
                $('#panel' + counter).removeClass('inactive');
                hide_all();
                $('#panel' + counter + ' > input').focus();
                $('#panel' + counter).show('slide', {
                    direction: 'left'
                }, 1000);
                current_active_question_number(counter);

                return true;
            }
        }

        function current_active_question_number(id) {
            $('.page-number').removeClass('btn-info');
            $('#anchor-number-' + id).addClass('btn-info');
        }

        $('.page-number').click(function () {
           
            var data_id = $(this).attr('data-id');
            var effect = 'right';
           // alert( $('.question').attr('id'));
            $('.question').addClass('inactive');
            $('#panel' + data_id).removeClass('inactive');
            hide_all();
            if (data_id < counter) {
                effect = 'left';
              //  prev();
            }
            counter = data_id;
            current_active_question_number(data_id);
            $('#panel' + data_id).show('slide', {
                direction: effect
            }, 1000);

            return true;
        });

        function hide_all() {
            $('.inactive').css('hidden',true);
        }
    });
    

</script>
