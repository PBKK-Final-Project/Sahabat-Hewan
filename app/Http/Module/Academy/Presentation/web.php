<?php

Route::post('/create-academy', [\App\Http\Module\Academy\Presentation\Controller\AcademyController::class, 'createAcademy']);
