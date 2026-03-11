<?php
namespace App\Services;



use App\Models\Promotion;
use App\Repositories\StudentRepository;
use App\Repositories\PromotionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class PromotionService
{ 
  
    protected $studentRepo;
    protected $promotionRepo;

    public function __construct(StudentRepository $studentRepo, PromotionRepository $promotionRepo)
    {
        $this->studentRepo   = $studentRepo;
        $this->promotionRepo = $promotionRepo;
    }

 
     
    public function getPromotionsByUser(array $data) 
    {
      return $this->studentRepo->getStudents($data);  
    }


    public function promoteStudents(array $data)
    {
        DB::transaction(function() use ($data) {

           
            $students = $this->getPromotionsByUser($data);
     

            foreach($students as $student){
                // update students
                $this->studentRepo->update([$student->id], [
                    'college_id'   => $data['college_id_new'],
                    'classroom_id' => $data['classroom_id_new'],
                    'section_id'   => $data['section_id_new'] ?? null,
                    'academic_year'=> $data['academic_year_new'],
                ]);

                // store promotion  
                $this->promotionRepo->createOrUpdate([
                    'student_id'        => $student->id,
                    'from_college'      => $data['college_id'],
                    'from_classroom'    => $data['classroom_id'],
                    'from_section'      => $data['section_id'] ?? null,
                    'to_college'        => $data['college_id_new'],
                    'to_classroom_id'   => $data['classroom_id_new'],
                    'to_section_id'     => $data['section_id_new'] ?? null,
                    'academic_year'     => $data['academic_year'] ?? null ,
                    'academic_year_new' => $data['academic_year_new'] ?? null ,
                ]);
            }

        });
    }

     public function rollbackPromotion(array $data , $id) 
     { 
          
         if($data['page_id'] && $data['page_id'] == 1){ 
            $promotions = $this->promotionRepo->all();
            foreach ($promotions as $promotion) {   
          $this->studentRepo->update([$promotion->student_id], [
                        'college_id'   => $promotion->from_college,
                        'classroom_id' => $promotion->from_classroom,
                        'section_id'   => $promotion->from_section,
                        'academic_year'=> $promotion->academic_year,
                ]);

                //  Delete All Pormotion
                Promotion::truncate();             
            }
         }else{
           $promotion = $this->promotionRepo->fetchoneitem($id);
            $this->studentRepo->update([$promotion->student_id], [
                      'college_id'   => $promotion->from_college,
                        'classroom_id' => $promotion->from_classroom,
                        'section_id'   => $promotion->from_section,
                        'academic_year'=> $promotion->academic_year,
                ]);
           $this->promotionRepo->delete($id);

         } 
     } 

     
}