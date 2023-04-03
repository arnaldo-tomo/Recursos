<?php

use App\Models\Avaliacao\Notas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\Admin\CursosController;
use App\Http\Controllers\Admin\TurmasController;
use App\Http\Controllers\Docente\NotasController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Admin\AnunciosController;
use App\Http\Controllers\Admin\DocentesController;
use App\Http\Controllers\Admin\HorariosController;
use App\Http\Controllers\Admin\PropinasController;
use App\Http\Controllers\Docente\HorarioController;
use App\Http\Controllers\Estudante\ExameController;
use App\Http\Controllers\Admin\AnoLectivoController;
use App\Http\Controllers\Admin\EstudantesController;
use App\Http\Controllers\Admin\InscricoesController;
use App\Http\Controllers\Admin\RelatoriosController;
use App\Http\Controllers\Admin\DisciplinasController;
use App\Http\Controllers\Docente\MateriaisController;
use App\Http\Controllers\Estudante\PropinaController as EstudanteProinaController;
use App\Http\Controllers\Docente\AvaliacoesController;
use App\Http\Controllers\Admin\TipoAvaliacaoController;
use App\Http\Controllers\Admin\Pagamento_propinasController;
use App\Http\Controllers\Estudante\NotasController as EstudanteNotasController;
use App\Http\Controllers\Estudante\HorarioController as EstudanteHorarioController;
use App\Http\Controllers\Estudante\MateriaisController as EstudanteMateriaisController;
use App\Http\Controllers\Estudante\AvaliacoesController as EstudanteAvaliacoesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/dashboard', [HomeController::class,'home'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// Route::get('/',[IndexController::class,'index']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/relatorio', [RelatoriosController::class, 'relatorios']);
Route::get('/todos_estudantes', [EstudantesController::class, 'todos_estudantes']);
Route::get('/novo_estudante', [EstudantesController::class, 'novo_estudante']);
Route::post('/actualizar_estudante/{id}', [EstudantesController::class, 'actualizar_estudante'])->name('actualizar_estudante');
Route::post('/renovar_matricula/{id}', [EstudantesController::class, 'renovar_matricula'])->name('renovar_matricula');
Route::post('/apagar_estudante/{id}', [EstudantesController::class, 'apagar_estudante'])->name('apagar_estudante');
Route::post('/salvar_estudante', [EstudantesController::class, 'salvar_estudante']);
Route::get('/json-turmas', [EstudantesController::class, 'turmas']);

//tipo de avaliação
Route::post('/criar_tipo_avaliacao', [TipoAvaliacaoController::class, 'criar_tipo_avaliacao']);
Route::get('/criar_tipo_avaliacao', [TipoAvaliacaoController::class, 'gestao_tipo_avaliacao']);
Route::get('/ver_tipo_avaliacao', [TipoAvaliacaoController::class, 'ver_tipo_avaliacao']);
Route::get('/apagar_tipo_avaliacao/{id}', [TipoAvaliacaoController::class, 'apagar_tipo_avaliacao'])->name('apagar_tipo_avaliacao');
Route::post('/actualizar_tipo_avaliacao/{id}', [TipoAvaliacaoController::class, 'actualizar_tipo_avaliacao'])->name('actualizar_tipo_avaliacao');

//Inscriicoes
Route::get('/inscricoes_estudantes', [InscricoesController::class, 'inscricoes']);
Route::post('/ver_inscricoes{id}', [InscricoesController::class, 'ver_inscricoes'])->name('ver_inscricoes');
Route::get('/inscricoes_estudantes_inscricao{id},{id1}', [InscricoesController::class, 'inscricao'])->name('inscricao');
Route::post('/nova_inscricao', [InscricoesController::class, 'nova_inscricao']);
Route::post('/inscricao_cadeiras', [InscricoesController::class, 'inscricao_cadeiras']);


Route::get('/todos_docentes', [DocentesController::class, 'todos_docentes']);
Route::get('/docente_disciplinas', [DocentesController::class, 'disciplinas']);
Route::post('/actualizar_docente/{id}', [DocentesController::class, 'actualizar_docente'])->name('actualizar_docente');
Route::post('/apagar_docente/{id}', [DocentesController::class, 'apagar_docente'])->name('apagar_docente');
Route::get('/novo_docente', [DocentesController::class, 'novo_docente']);
Route::post('/salvar_docente', [DocentesController::class, 'salvar_docente']);
Route::get('/detalhes_docente{id}', [DocentesController::class, 'detalhes_docentes'])->name('detalhes_docentes');


Route::get('/gestao_anuncios', [AnunciosController::class, 'gestao_anuncios']);
Route::post('/salvar_anuncio', [AnunciosController::class, 'salvar_anuncio']);
Route::get('/apagar_anuncio/{id}', [AnunciosController::class, 'apagar_anuncio'])->name('apagar_anuncio');
Route::post('/actualizar_anuncio/{id}', [AnunciosController::class, 'actualizar_anuncio'])->name('actualizar_anuncio');

Route::get('/gestao_cursos', [CursosController::class, 'gestao_cursos']);
Route::get('/json-nivel', [CursosController::class, 'mostrar_nivel']);
Route::post('/salvar_curso', [CursosController::class, 'salvar_curso']);
Route::get('/ver_cursos', [CursosController::class, 'ver_cursos']);
Route::get('/apagar_curso/{id}', [CursosController::class, 'apagar_curso'])->name('apagar_curso');
Route::post('/actualizar_curso/{id}', [CursosController::class, 'actualizar_curso'])->name('actualizar_curso');


Route::get('/nova_turma', [TurmasController::class, 'nova_turma'])->name('nova_turma');
Route::get('/gestao_turmas', [TurmasController::class, 'gestao_turmas'])->name('gestao_turmas');
Route::post('/salvar_turma', [TurmasController::class, 'salvar_turma'])->name('salvar_turma');
Route::get('/ver_turmas', [TurmasController::class, 'ver_turmas'])->name('ver_turmas');
Route::get('/apagar_turma/{id}', [TurmasController::class, 'apagar_turma'])->name('apagar_turma');
Route::post('/actualizar_turma/{id}', [TurmasController::class, 'actualizar_turma'])->name('actualizar_turma');

Route::get('/gestao_disciplinas', [DisciplinasController::class, 'gestao_disciplina']);
Route::post('/salvar_disciplina', [DisciplinasController::class, 'salvar_disciplina']);
Route::post('/conectar_docentes', [DisciplinasController::class, 'conectar_docentes']);
Route::post('/conectar_cursos', [DisciplinasController::class, 'conectar_cursos']);
Route::get('/ver_disciplinas', [DisciplinasController::class, 'ver_disciplina']);
Route::get('/apagar_disciplina/{id}', [DisciplinasController::class, 'apagar_disciplina'])->name('apagar_disciplina');
Route::post('/actualizar_disciplina/{id}', [DisciplinasController::class, 'actualizar_disciplina'])->name('actualizar_disciplina');

Route::get('/criar_horario', [HorariosController::class, 'frm_horario']);
Route::post('/salvar_horario', [HorariosController::class, 'salvar_horario']);
Route::post('/salvar_turno', [HorariosController::class, 'salvar_turno']);
Route::post('/salvar_tempo', [HorariosController::class, 'salvar_tempo']);
Route::get('/json-disciplinas', [HorariosController::class, 'disciplinas']);
Route::get('/json-turmas', [HorariosController::class, 'turmas']);
Route::get('/json-periodos', [HorariosController::class, 'mostrar_periodos']);
Route::get('/json-turnos', [HorariosController::class, 'mostrar_turnos']);
Route::get('/json-tempos', [HorariosController::class, 'mostrar_tempos']);
Route::get('/ver_horario', [HorariosController::class, 'ver_horario']);
Route::post('/pesquisar_horario', [HorariosController::class, 'pesquisar_horario']);
Route::get('/turnos', [HorariosController::class, 'turno']);
Route::get('/tempos', [HorariosController::class, 'tempos']);
Route::get('/apagar_tempo/{id}', [HorariosController::class, 'apagar_tempo'])->name('apagar_tempo');
Route::get('/apagar_horario/{id}', [HorariosController::class, 'apagar_horario'])->name('apagar_horario');
Route::post('/actualizar_horario/{id}', [HorariosController::class, 'actualizar_horario'])->name('actualizar_horario');
Route::post('/actualizar_tempo/{id}', [HorariosController::class, 'actualizar_tempo'])->name('actualizar_tempo');

Route::get('/ano_lectivo', [AnoLectivoController::class, 'ano_lectivo']);
Route::post('/salvar_ano_lectivo', [AnoLectivoController::class, 'salvar_ano_lectivo']);



//Rotas para Configuracao #
Route::get('/configuracao', [ConfiguracaoController::class, 'configuracao']);
Route::post('/Salvar_Periodo_academico', [ConfiguracaoController::class, 'Salvar_Periodo_academico']);
Route::get('/Delete_Periodo_academico/{id}', [ConfiguracaoController::class, 'Delete_Periodo_academico'])->name('Delete_Periodo_academico');
Route::get('/Update_Periodo_academico/{id}', [ConfiguracaoController::class, 'Update_Periodo_academico'])->name('Update_Periodo_academico');
Route::get('/Update_modulo_academico/{id}', [ConfiguracaoController::class, 'Update_modulo_academico'])->name('Update_modulo_academico');
Route::post('/Salvar_modulo_academico', [ConfiguracaoController::class, 'Salvar_modulo_academico']);
Route::get('/Delete_Modulo_academico/{id}', [ConfiguracaoController::class, 'Delete_Modulo_academico'])->name('Delete_Modulo_academico');

// Rotas para Area do docente

Route::get('/criar_avaliacao', [AvaliacoesController::class, 'nova_avaliacao']);
Route::post('/salvar_nova_avaliacao', [AvaliacoesController::class, 'salvar_avaliacao']);
Route::get('/apagar_avaliacao/{id}', [AvaliacoesController::class, 'apagar_avaliacao'])->name('apagar_avaliacao');
Route::post('/actualizar_avaliacao/{id}', [AvaliacoesController::class, 'actualizar_avaliacao'])->name('actualizar_avaliacao');

Route::get('/criar_material', [MateriaisController::class, 'novo_material']);
Route::post('/salvar_material', [MateriaisController::class, 'salvar_material']);
Route::post('/pesquisar_avaliacoes', [AvaliacoesController::class, 'pesquisar_avaliacoes']);
Route::post('/pesquisar_materiais', [MateriaisController::class, 'pesquisar_materiais']);
Route::get('/apagar_material/{id}', [MateriaisController::class, 'apagar_material'])->name('apagar_material');
Route::post('/actualizar_material/{id}', [MateriaisController::class, 'actualizar_material'])->name('actualizar_material');

Route::get('/download_avaliacao', [AvaliacoesController::class, 'todas_avaliacoes']);
Route::get('/download_material', [MateriaisController::class, 'todos_materiais']);

Route::get('/criar_classificacao', [NotasController::class, 'criar_notas']);
Route::get('/ver_notas', [NotasController::class, 'ver_notas']);
Route::post('/pesquisar_notas', [NotasController::class, 'pesquisar_notas']);
Route::post('/pesquisar_pauta_estudante', [NotasController::class, 'pesquisar_estudante_notas']);
Route::get('/ver_pautas', [NotasController::class, 'pautas']);
Route::get('/ver_pautas_exames', [NotasController::class, 'pautas_exames']);
Route::post('/pesquisar_atribuir_notas', [NotasController::class, 'pesquisar_atribuir_notas']);
Route::post('/salvar_notas', [NotasController::class, 'salvar_notas']);
Route::get('/apagar_nota/{id}', [NotasController::class, 'apagar_nota'])->name('apagar_nota');
Route::post('/actualizar_nota/{id}', [NotasController::class, 'actualizar_nota'])->name('actualizar_nota');

Route::get('/horario_docentes', [HorarioController::class, 'horario_docentes']);

Route::get('/relatorio_notas', [NotasController::class, 'relatorio']);

// Rotas para Area do estudante

Route::get('/download_avaliacao_estudante', [EstudanteAvaliacoesController::class, 'download_avaliacoes']);
Route::get('/upload_avaliacao', [EstudanteAvaliacoesController::class, 'upload_avaliacoes']);
Route::post('/pesquisar_avaliacoes_estudante', [EstudanteAvaliacoesController::class, 'pesquisar_avaliacoes']);
Route::get('/materiais_academicos', [EstudanteMateriaisController::class, 'todos_materiais']);

Route::get('/notas_testes', [EstudanteNotasController::class, 'notas_testes']);
Route::get('/pesquisar_notas_estudante', [EstudanteNotasController::class, 'pesquisar_notas']);
Route::post('pesquisar_pauta_frequencia_estudante', [EstudanteNotasController::class, 'pesquisar_pauta_frequencia']);
Route::post('pesquisar_pauta_frequencia_exame', [EstudanteNotasController::class, 'pesquisar_pauta_exame']);
Route::get('/notas_exame', [EstudanteNotasController::class, 'notas_exame']);
Route::get('/notas_frequencia', [EstudanteNotasController::class, 'notas_frequencia']);


Route::get('/horarios_estudantes', [EstudanteHorarioController::class, 'horarios']);
Route::get('/juris', [ExameController::class, 'juris']);
Route::get('/calendario_exames', [ExameController::class, 'calendario']);
Route::get('/propinas', [EstudanteProinaController::class, 'propina']);

//Inicio das rotas para filtrar pagamentos
Route::post('/filtrar_pagamentos', [EstudanteProinaController::class, 'filtrar_pagamentos'])->name('filtrar_pagamentos');

//Rotas para propinas
//Route::get('/propinas',[PropinasController::class,'propina']);
Route::get('/criar_propinas', [PropinasController::class, 'ver_propinas']);
Route::post('/salvar_propina', [PropinasController::class, 'salvar_propina']);
Route::get('/apagar_propina/{id}', [PropinasController::class, 'apagar_curso'])->name('apagar_propina');
Route::post('/actualizar_propina/{id}', [PropinasController::class, 'actualizar_curso'])->name('actualizar_propina');
// Route::get('/factura', [PropinasController::class, 'recibo'])->name('factura');

////Rotas para pagamentos
Route::get('/json-estudantes', [Pagamento_propinasController::class, 'estudantes']);
Route::post('/pesquisar_pagamento_estudante', [Pagamento_propinasController::class, 'pesquisar_pagamento_estudante']);
Route::post('/actualizar_pagamento/{id}', [Pagamento_propinasController::class, 'actualizar_pagamento'])->name('actualizar_pagamento');
Route::get('/pagar_propina', [Pagamento_propinasController::class, 'pagamento']);
Route::get('/ver_pagamentos', [Pagamento_propinasController::class, 'ver_pagamento']);
Route::post('/pesquisar_pagamento', [Pagamento_propinasController::class, 'pesquisar_pagamento']);
Route::get('/factura', [Pagamento_propinasController::class, 'factura'])->name('factura');
Route::get('/downloadFatura/{id}', [Pagamento_propinasController::class, 'downloadpdf'])->name('downloadpdf');
