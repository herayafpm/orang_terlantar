 <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/') ?>datatables/jquery.dataTables.min.css">
 <div class="container auth-section" data-aos="fade-up">
   <div class="section-title">
     <h2>List Orang Terlantar Terdaftar</h2>
     <p><?= APP_NAME ?></p>
   </div>
   <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
     <div class="col-lg-12">
       <div class="alert alert-div" role="alert"></div>
       <div class="table table-responsive">

         <table id="datatable" class="table table-striped table-bordered nowrap">
           <thead>
             <tr style="text-align: center">
               <th>No.</th>
               <th>Kecamatan</th>
               <th>Jumlah</th>
             </tr>
           </thead>
           <tbody>
             <?php if (sizeof($_fields) > 0) : ?>
               <?php
                $no = 1;
                foreach ($_fields as $field) : ?>
                 <tr>
                   <td class="text-center"><?= $no ?></td>
                   <td><?= $field['nama'] ?></td>
                   <td class="text-center"><?= $field['jumlah'] ?></td>
                 </tr>
               <?php
                  $no++;
                endforeach ?>
             <?php else : ?>
               <tr style="text-align: center;">
                 <td colspan="7">
                   TIDAK ADA DATA
                 </td>
               </tr>
             <?php endif ?>
           </tbody>
         </table>
       </div>

     </div>

   </div>

 </div>