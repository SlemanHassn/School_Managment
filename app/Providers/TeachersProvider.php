<?php

namespace App\Providers;

use App\Repository\AttendancesRepository;
use App\Repository\AttendancesRepositoryInterface;
use App\Repository\ExamRepository;
use App\Repository\ExamRepositoryInterface;
use App\Repository\FeeInvoicesRepository;
use App\Repository\FeeInvoicesRepositoryInterface;
use App\Repository\FeeRepository;
use App\Repository\FeeRepositoryInterface;
use App\Repository\GraduatedRepository;
use App\Repository\GraduatedRepositoryInterface;
use App\Repository\LibraryRepository;
use App\Repository\LibraryRepositoryInterface;
use App\Repository\PaymentRepository;
use App\Repository\PaymentRepositoryInterface;
use App\Repository\ProcessingFeeRepository;
use App\Repository\ProcessingFeeRepositoryInterface;
use App\Repository\PromotionsRepository;
use App\Repository\PromotionsRepositoryInterface;
use App\Repository\QuestionRepository;
use App\Repository\QuestionRepositoryInterface;
use App\Repository\quizzRepository;
use App\Repository\quizzRepositoryInterface;
use App\Repository\ReceiptStudentsRepository;
use App\Repository\ReceiptStudentsRepositoryInterface;
use App\Repository\StudentsRepository;
use App\Repository\StudentsRepositoryInterface;
use App\Repository\SubjectRepository;
use App\Repository\SubjectRepositoryInterface;
use App\Repository\TeachersRepository;
use App\Repository\TeachersRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TeachersProvider extends ServiceProvider
{

    public function register(): void
    {
        $this
            ->app
            ->bind(TeachersRepositoryInterface::class, TeachersRepository::class);
        $this
            ->app
            ->bind(StudentsRepositoryInterface::class, StudentsRepository::class);
        $this
            ->app
            ->bind(PromotionsRepositoryInterface::class, PromotionsRepository::class);
        $this
            ->app
            ->bind(GraduatedRepositoryInterface::class, GraduatedRepository::class);
        $this
            ->app
            ->bind(FeeRepositoryInterface::class, FeeRepository::class);
        $this
            ->app
            ->bind(FeeInvoicesRepositoryInterface::class, FeeInvoicesRepository::class);
        $this
            ->app
            ->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
        $this
            ->app
            ->bind(ProcessingFeeRepositoryInterface::class, ProcessingFeeRepository::class);
        $this
            ->app
            ->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this
            ->app
            ->bind(AttendancesRepositoryInterface::class, AttendancesRepository::class);
        $this
            ->app
            ->bind(SubjectRepositoryInterface::class, SubjectRepository::class);
        $this
            ->app
            ->bind(quizzRepositoryInterface::class, quizzRepository::class);
        $this
            ->app
            ->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this
            ->app
            ->bind(LibraryRepositoryInterface::class, LibraryRepository::class);

    }


    public function boot(): void
    {
        //
    }
}
