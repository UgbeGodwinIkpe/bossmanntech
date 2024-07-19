<?php
        if (isset($_POST['diagnose'])) {
           if (!empty($_POST['symptoms2'])) {
               $symptoms = $_POST['symptoms2'];
               $date=date('d/m/y');

                 $malaria=array('Fever','Chills or cold', 'Headache', 'Nausea and vomitting', 'Diarrhea', 'Abdominal pain', 'Muscle and joint pains', 'Cough', 'Lack of appetite', 'Feelings of discomfort', 'Weakness');
                 $buruli_ulcer=array('Painless lump');
                 $dengue=array('High Fever', 'Severe headache', 'Pain behind the eyes', 'Muscle and joint pains', 'Nausea', 'Vomiting', 'Swollen glands', 'Rash');
                 $severe_dengue=array('Severe abdominal pain', 'Persistent vomiting', 'Rapid breathing', 'Bleeding gums', 'Fatique', 'Restlessness', 'Liver enlargement', 'Blood in vomit or stool');
                 $fascioliasis=array('Abdominal pain', 'Hepatomegaly', 'Nausea', 'Diarrhea', 'Shortness of breath', 'Vomiting', 'Intermittent fever', 'Urticarial malaise', 'Weight loss');
                 $other=array('Painless lump', 'Pain behind the eyes', 'Rash', 'Swollen glands', 'Liver enlargement', 'Blood in vomit or stool', 'Hepatomegaly', 'Urticarial malaise', 'Weight loss');
               //   Rearranging the arrays is aphabetical order
                 sort($symptoms);
                 sort($malaria);
                 sort($buruli_ulcer);
                 sort($dengue);
                 sort($severe_dengue);
                 sort($fascioliasis);
                 $symps = implode(', ', $symptoms);
               //   comparing the selected symptoms with individual array to get their differnce
                 $malariadiff=array_diff($symptoms, $malaria);
                 $buruli_ulcerdiff=array_diff($symptoms, $buruli_ulcer);
                 $denguediff=array_diff($symptoms, $dengue);
                 $severe_denguediff=array_diff($symptoms, $severe_dengue);
                 $fascioliasisdiff=array_diff($symptoms, $fascioliasis);

                  
            }
               // check if symptoms are malaria
                 if(($symptoms==$malaria) && (empty(array_intersect($malariadiff, $other)))){
                     //checking if the patient is pregnant
                  if($m_status='pregnant'){  
                     $qm = "SELECT * FROM drugs WHERE disease = 'malaria' AND pregnant=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                     // or check if the patient has pb
                  }elseif($m_status='bp' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'malaria' AND pb=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                     //or check if the it a diabetic patient
                  }elseif($m_status='pb' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'malaria' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                  }
                  elseif($m_status='diabetic' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'malaria' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                  }elseif($m_status='diabetic' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'malaria' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                  }
                      
                    echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xpert-D\'s Result</h5>
                                <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="top">
                                    <div class="top-item">
                                        <h6>Patient\'s Name: The First</h6>
                                        <span>'.$name.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Age:</h6>
                                        <span>'.$age.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Address:</h6>
                                        <span>'.$address.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Date:</h6>
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="bottom-item">
                                        <h6>Disease Name:</h6>
                                        <span>Malaria</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>symptoms:</h6>
                                        <span class="symptoms">'.$symps.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>Prescribed Drugs:</h6>
                                        <span class="drugs">'.$drugss.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <p class="instructions">'.$instructions.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                                <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                            </div>
                        </div>
                     </div>
                     </div>';
                 }else if((sizeof($symptoms)<3) && (empty(array_intersect($malariadiff, $other)))){
                   //checking if the patient is pregnant
                   if($m_status='pregnant'){  
                     $qm = "SELECT * FROM drugs WHERE disease = 'Malaria' AND pregnant=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                     // or check if the patient has pb
                  }elseif($m_status='bp' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Malaria' AND pb=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                     //or check if the it a diabetic patient
                  }elseif($m_status='pb' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Malaria' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                  }
                  elseif($m_status='diabetic' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'malaria' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                  }elseif($m_status='diabetic' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Malaria' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                  }
                      
                    echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xpert-D\'s Result</h5>
                                <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="top">
                                    <div class="top-item">
                                        <h6>Patient\'s Name: The Second</h6>
                                        <span>'.$name.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Age:</h6>
                                        <span>'.$age.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Address:</h6>
                                        <span>'.$address.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Date:</h6>
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="bottom-item">
                                        <h6>Disease Name:</h6>
                                        <span>Malaria</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>symptoms:</h6>
                                        <span class="symptoms">'.$symps.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>Prescribed Drugs:</h6>
                                        <span class="drugs">'.$drugss.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <p class="instructions">'.$instructions.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                                <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                            </div>
                        </div>
                     </div>
                     </div>';
                 }
               //   check if symptoms are buruli ulcer
                 else if(($symptoms==$buruli_ulcer)  || array_intersect($symptoms, $buruli_ulcerdiff)){
                  //checking if the patient is pregnant
                  if($m_status='pregnant'){  
                     $qm = "SELECT * FROM drugs WHERE disease = 'Buruli ulcer' AND pregnant=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 10 mg/kg once daily';
                     // or check if the patient has pb
                  }elseif($m_status='bp' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Buruli ulcer' AND pb=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 10 mg/kg once daily for 6 days';
                     //or check if the it a diabetic patient
                  }elseif($m_status='pb' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Buruli ulcer' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 7.5 mg/kg once daily for 4 days';
                  }
                  elseif($m_status='diabetic' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Buruli ulcer' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 10 mg/kg once daily for 6 days';
                  }elseif($m_status='diabetic' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Buruli ulcer' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 7.5 mg/kg once daily for 4 days';
                  }
                      
                    echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xpert-D\'s Result</h5>
                                <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="top">
                                    <div class="top-item">
                                        <h6>Patient\'s Name: 3rd</h6>
                                        <span>'.$name.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Age:</h6>
                                        <span>'.$age.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Address:</h6>
                                        <span>'.$address.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Date:</h6>
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="bottom-item">
                                        <h6>Disease Name:</h6>
                                        <span>Buruli ulcer</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>symptoms:</h6>
                                        <span class="symptoms">'.$symps.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>Prescribed Drugs:</h6>
                                        <span class="drugs">'.$drugss.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <p class="instructions">'.$instructions.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                                <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                            </div>
                        </div>
                     </div>
                     </div>';
                 }else
               //   check if symtopms are dengue fiver
               if(($symptoms==$dengue) && (empty(array_intersect($denguediff, $other)))){
                  //checking if the patient is pregnant
                  if($m_status='pregnant'){  
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND pregnant=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 8 hours,  up to 3 times in a 24-hour period';
                     // or check if the patient has pb
                  }elseif($m_status='bp' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND pb=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 6 hours,  up to 3 times in a 24-hour period';
                     //or check if the it a diabetic patient
                  }elseif($m_status='pb' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 1 tablet every 8 hours,  up to 3 times in a 24-hour period';
                  }
                  elseif($m_status='diabetic' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablet every 8 hours,  up to 3 times in a 24-hour period';
                  }elseif($m_status='diabetic' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take every  6 hours,  up to 3 times in a 24-hour period';
                  }
                      
                    echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xpert-D\'s Result</h5>
                                <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="top">
                                    <div class="top-item">
                                        <h6>Patient\'s Name: 4th</h6>
                                        <span>'.$name.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Age:</h6>
                                        <span>'.$age.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Address:</h6>
                                        <span>'.$address.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Date:</h6>
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="bottom-item">
                                        <h6>Disease Name:</h6>
                                        <span>Malaria</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>symptoms:</h6>
                                        <span class="symptoms">'.$symps.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>Prescribed Drugs:</h6>
                                        <span class="drugs">'.$drugss.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <p class="instructions">'.$instructions.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                                <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                            </div>
                        </div>
                     </div>
                     </div>';
               }else if((sizeof($symptoms)>=3) && (empty(array_intersect($denguediff, $other)))){
                  //checking if the patient is pregnant
                  if($m_status='pregnant'){  
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND pregnant=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 6 hours,  up to 3 times in a 24-hour period.';
                     // or check if the patient has pb
                  }elseif($m_status='bp' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND pb=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 6 hours,  up to 3 times in a 24-hour period';
                     //or check if the it a diabetic patient
                  }elseif($m_status='pb' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 1 taablet every 8 hours,  up to 3 times in a 24-hour period';
                  }
                  elseif($m_status='diabetic' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 8 hours,  up to 3 times in a 24-hour period';
                  }elseif($m_status='diabetic' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take a second dose after 8hrs of the first dose. After that take remaining doses morning and evening along side with 2 tablets of <b>Emzor</b>paracetamol';
                  }
                      
                    echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xpert-D\'s Result</h5>
                                <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="top">
                                    <div class="top-item">
                                        <h6>Patient\'s Name: 5th</h6>
                                        <span>'.$name.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Age:</h6>
                                        <span>'.$age.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Address:</h6>
                                        <span>'.$address.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Date:</h6>
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="bottom-item">
                                        <h6>Disease Name:</h6>
                                        <span>Dengue</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>symptoms:</h6>
                                        <span class="symptoms">'.$symps.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>Prescribed Drugs:</h6>
                                        <span class="drugs">'.$drugss.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <p class="instructions">'.$instructions.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                                <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                            </div>
                        </div>
                     </div>
                     </div>';
               }else
                  // check if symptoms are for severe_dengue
               if(($symptoms==$severe_dengue) && (empty(array_intersect($severe_denguediff, $other)))){
                  //checking if the patient is pregnant
                  if($m_status='pregnant'){  
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND pregnant=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 8 hours,  up to 3 times in a 24-hour period';
                     // or check if the patient has pb
                  }elseif($m_status='bp' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND pb=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 8 hours,  up to 3 times in a 24-hour period';
                     //or check if the it a diabetic patient
                  }elseif($m_status='pb' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 1 tablets every 8 hours,  up to 3 times in a 24-hour period';
                  }
                  elseif($m_status='diabetic' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 8 hours,  up to 3 times in a 24-hour period';
                  }elseif($m_status='diabetic' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 1 tablet every 8 hours,  up to 3 times in a 24-hour period';
                  }
                      
                    echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xpert-D\'s Result</h5>
                                <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="top">
                                    <div class="top-item">
                                        <h6>Patient\'s Name: 6th</h6>
                                        <span>'.$name.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Age:</h6>
                                        <span>'.$age.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Address:</h6>
                                        <span>'.$address.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Date:</h6>
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="bottom-item">
                                        <h6>Disease Name:</h6>
                                        <span>Severe Dengue</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>symptoms:</h6>
                                        <span class="symptoms">'.$symps.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>Prescribed Drugs:</h6>
                                        <span class="drugs">'.$drugss.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <p class="instructions">'.$instructions.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                                <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                            </div>
                        </div>
                     </div>
                     </div>';
               }else if((sizeof($symptoms)>=3) && (empty(array_intersect($severe_denguediff, $other)))){
                  //checking if the patient is pregnant
                  if($m_status='pregnant'){  
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND pregnant=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 8 hours,  up to 3 times in a 24-hour period';
                     // or check if the patient has pb
                  }elseif($m_status='bp' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND pb=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 8 hours,  up to 3 times in a 24-hour period';
                     //or check if the it a diabetic patient
                  }elseif($m_status='pb' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 1 tablets every 8 hours,  up to 3 times in a 24-hour period';
                  }
                  elseif($m_status='diabetic' &&   $age>=12){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 2 tablets every 8 hours,  up to 3 times in a 24-hour period';
                  }elseif($m_status='diabetic' &&   $age<=11){
                     $qm = "SELECT * FROM drugs WHERE disease = 'Dengue' AND diabeti=1 LIMIT 1";
                     $cm = mysqli_query($link, $qm);
                     $fm = mysqli_fetch_assoc($cm);
                     $dname = $fm['name'];
                     $dbrand = $fm['brand'];
                     $dweight=$fm['weight'];
                     $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                     $instructions='Take 1 tablet every 8 hours,  up to 3 times in a 24-hour period';
                  }
                      
                    echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                        <div class=" modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xpert-D\'s Result</h5>
                                <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                                <div class="top">
                                    <div class="top-item">
                                        <h6>Patient\'s Name: 8th</h6>
                                        <span>'.$name.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Age:</h6>
                                        <span>'.$age.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Address:</h6>
                                        <span>'.$address.'</span>
                                    </div>
                                    <div class="top-item">
                                        <h6>Date:</h6>
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="bottom-item">
                                        <h6>Disease Name:</h6>
                                        <span>Severe Dengue</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>symptoms:</h6>
                                        <span class="symptoms">'.$symps.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <h6>Prescribed Drugs:</h6>
                                        <span class="drugs">'.$drugss.'</span>
                                    </div>
                                    <div class="bottom-item">
                                        <p class="instructions">'.$instructions.'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                                <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                            </div>
                        </div>
                     </div>
                     </div>';
               }else
               // check if symptoms are for fascioliasis
            if(($symptoms==$fascioliasis) && (empty(array_intersect($fascioliasisdiff, $other)))){
               //checking if the patient is pregnant
               if($m_status='pregnant'){  
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND pregnant=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='Take 2-dose regimen of 10 mg/kg/dose separated by 12 hours';
                  // or check if the patient has pb
               }elseif($m_status='bp' &&   $age>=12){
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND pb=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='Take 2-dose regimen of 10 mg/kg/dose separated by 12 hours';
                  //or check if the it a diabetic patient
               }elseif($m_status='pb' &&   $age<=11){
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND diabeti=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='Take 2-dose regimen of 10 mg/kg/dose separated by 12 hours';
               }
               elseif($m_status='diabetic' &&   $age>=12){
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND diabeti=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='Take 2-dose regimen of 10 mg/kg/dose separated by 12 hours';
               }elseif($m_status='diabetic' &&   $age<=11){
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND diabeti=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='Take 2-dose regimen of 10 mg/kg/dose separated by 12 hours';
               }
                   
                 echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                     <div class=" modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title">Xpert-D\'s Result</h5>
                             <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                         </div>
                         <div class="modal-body">
                             <div class="top">
                                 <div class="top-item">
                                     <h6>Patient\'s Name: 9th</h6>
                                     <span>'.$name.'</span>
                                 </div>
                                 <div class="top-item">
                                     <h6>Age:</h6>
                                     <span>'.$age.'</span>
                                 </div>
                                 <div class="top-item">
                                     <h6>Address:</h6>
                                     <span>'.$address.'</span>
                                 </div>
                                 <div class="top-item">
                                     <h6>Date:</h6>
                                     <span>'.$date.'</span>
                                 </div>
                             </div>
                             <div class="bottom">
                                 <div class="bottom-item">
                                     <h6>Disease Name:</h6>
                                     <span>'.$fascioliasis.'</span>
                                 </div>
                                 <div class="bottom-item">
                                     <h6>symptoms:</h6>
                                     <span class="symptoms">'.$symps.'</span>
                                 </div>
                                 <div class="bottom-item">
                                     <h6>Prescribed Drugs:</h6>
                                     <span class="drugs">'.$drugss.'</span>
                                 </div>
                                 <div class="bottom-item">
                                     <p class="instructions">'.$instructions.'</p>
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                             <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                         </div>
                     </div>
                  </div>
                  </div>';
            }else if((sizeof($symptoms)>=3) && (empty(array_intersect($fascioliasisdiff, $other)))){
               //checking if the patient is pregnant
               if($m_status='pregnant'){  
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND pregnant=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='2-dose regimen of 10 mg/kg/dose separated by 12 hours';
                  // or check if the patient has pb
               }elseif($m_status='bp' &&   $age>=12){
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND pb=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='2-dose regimen of 10 mg/kg/dose separated by 12 hours';
                  //or check if the it a diabetic patient
               }elseif($m_status='pb' &&   $age<=11){
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND diabeti=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='2-dose regimen of 10 mg/kg/dose separated by 12 hours';
               }
               elseif($m_status='diabetic' &&   $age>=12){
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND diabeti=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='2-dose regimen of 10 mg/kg/dose separated by 12 hours';
               }elseif($m_status='diabetic' &&   $age<=11){
                  $qm = "SELECT * FROM drugs WHERE disease = 'Fascioliasis' AND diabeti=1 LIMIT 1";
                  $cm = mysqli_query($link, $qm);
                  $fm = mysqli_fetch_assoc($cm);
                  $dname = $fm['name'];
                  $dbrand = $fm['brand'];
                  $dweight=$fm['weight'];
                  $drugss='Name: '.$dname.', Brand:'.$dbrand.' '.$dweight;
                  $instructions='2-dose regimen of 10 mg/kg/dose separated by 12 hours';
               }
                   
                 echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                     <div class=" modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title">Xpert-D\'s Result</h5>
                             <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                         </div>
                         <div class="modal-body">
                             <div class="top">
                                 <div class="top-item">
                                     <h6>Patient\'s Name: 10th</h6>
                                     <span>'.$name.'</span>
                                 </div>
                                 <div class="top-item">
                                     <h6>Age:</h6>
                                     <span>'.$age.'</span>
                                 </div>
                                 <div class="top-item">
                                     <h6>Address:</h6>
                                     <span>'.$address.'</span>
                                 </div>
                                 <div class="top-item">
                                     <h6>Date:</h6>
                                     <span>'.$date.'</span>
                                 </div>
                             </div>
                             <div class="bottom">
                                 <div class="bottom-item">
                                     <h6>Disease Name:</h6>
                                     <span>'.$fascioliasis.'</span>
                                 </div>
                                 <div class="bottom-item">
                                     <h6>symptoms:</h6>
                                     <span class="symptoms">'.$symps.'</span>
                                 </div>
                                 <div class="bottom-item">
                                     <h6>Prescribed Drugs:</h6>
                                     <span class="drugs">'.$drugss.'</span>
                                 </div>
                                 <div class="bottom-item">
                                     <p class="instructions">'.$instructions.'</p>
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                             <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                         </div>
                     </div>
                  </div>
                  </div>';
            }else{
               echo '<div class="myModal" id="resultModal" aria-labelledby="resultModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="sectionToPrint">
                   <div class=" modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title">Xpert-D\'s Result</h5>
                           <!-- <button class="btn-close close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                       </div>
                       <div class="modal-body">
                           <div class="top">
                               <div class="top-item">
                                   <h6>Patient\'s Name:</h6>
                                   <span>'.$name.'</span>
                               </div>
                               <div class="top-item">
                                   <h6>Age:</h6>
                                   <span>'.$age.'</span>
                               </div>
                               <div class="top-item">
                                   <h6>Address:</h6>
                                   <span>'.$address.'</span>
                               </div>
                               <div class="top-item">
                                   <h6>Date:</h6>
                                   <span>'.$date.'</span>
                               </div>
                           </div>
                           <div class="bottom">
                               <div class="bottom-item">
                                   <h6>Disease Name:</h6>
                                   <span class="allert alert-danger">
                                   Your symptoms looks complicated. Please contact a Medical Doctor
                                   </span>
                               </div>
                               <div class="bottom-item">
                                   <h6>symptoms:</h6>
                                   <span class="symptoms">'.$symps.'</span>
                               </div>
                               <div class="bottom-item">
                                   <h6>Prescribed Drugs:</h6>
                                   <span class="drugs"></span>
                               </div>
                               <div class="bottom-item">
                                   <p class="instructions">Instructions</p>
                               </div>
                           </div>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
                           <a href="result.php" class="btn btn-primary" target="blank">Print</a>
                       </div>
                   </div>
               </div>
           </div>';
            }
               

            
        }

?>