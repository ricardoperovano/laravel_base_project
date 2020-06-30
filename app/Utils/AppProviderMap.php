<?php

namespace App\Utils;

use App\Repositories\AgendamentoRepository;
use App\Contracts\AgendamentoContract;
use App\Repositories\AgendamentoInativoRepository;
use App\Contracts\AgendamentoInativoContract;
use App\Repositories\AgendamentoMedicoRepository;
use App\Contracts\AgendamentoMedicoContract;
use App\Repositories\ApoiadorRepository;
use App\Contracts\ApoiadorContract;
use App\Repositories\ApontamentoRepository;
use App\Contracts\ApontamentoContract;
use App\Repositories\AreaRepository;
use App\Contracts\AreaContract;
use App\Repositories\CategoriaProdutoRepository;
use App\Contracts\CategoriaProdutoContract;
use App\Repositories\CepRepository;
use App\Contracts\CepContract;
use App\Repositories\CidRepository;
use App\Contracts\CidContract;
use App\Repositories\CidadeRepository;
use App\Contracts\CidadeContract;
use App\Repositories\ColaboradorRepository;
use App\Contracts\ColaboradorContract;
use App\Repositories\ColaboradorUnidadeSaudeRepository;
use App\Contracts\ColaboradorUnidadeSaudeContract;
use App\Repositories\ComentarioAgendamentoRepository;
use App\Contracts\ComentarioAgendamentoContract;
use App\Repositories\ConsorcioRepository;
use App\Contracts\ConsorcioContract;
use App\Repositories\DiagnosticoExameRepository;
use App\Contracts\DiagnosticoExameContract;
use App\Repositories\EmpresaRepository;
use App\Contracts\EmpresaContract;
use App\Repositories\EnderecoRepository;
use App\Contracts\EnderecoContract;
use App\Repositories\EquipeRepository;
use App\Contracts\EquipeContract;
use App\Repositories\EspecialidadeExameRepository;
use App\Contracts\EspecialidadeExameContract;
use App\Repositories\EspecialidadeExameMedicoRepository;
use App\Contracts\EspecialidadeExameMedicoContract;
use App\Repositories\EstoqueMinimoRepository;
use App\Contracts\EstoqueMinimoContract;
use App\Repositories\ExameRepository;
use App\Contracts\ExameContract;
use App\Repositories\ExameAgendamentoRepository;
use App\Contracts\ExameAgendamentoContract;
use App\Repositories\ExameComplementarRepository;
use App\Contracts\ExameComplementarContract;
use App\Repositories\ExameMedicoRepository;
use App\Contracts\ExameMedicoContract;
use App\Repositories\FabricanteRepository;
use App\Contracts\FabricanteContract;
use App\Repositories\FraseRepository;
use App\Contracts\FraseContract;
use App\Repositories\FraseAgendamentoRepository;
use App\Contracts\FraseAgendamentoContract;
use App\Repositories\FraseAgendamentoValorRepository;
use App\Contracts\FraseAgendamentoValorContract;
use App\Repositories\FraseExameRepository;
use App\Contracts\FraseExameContract;
use App\Repositories\FraseLaudoRepository;
use App\Contracts\FraseLaudoContract;
use App\Repositories\FraseLaudoValorRepository;
use App\Contracts\FraseLaudoValorContract;
use App\Repositories\FraseOrgaoRepository;
use App\Contracts\FraseOrgaoContract;
use App\Repositories\HistoricoContratoUnidadeRepository;
use App\Contracts\HistoricoContratoUnidadeContract;
use App\Repositories\HistoricoLocalPatrimonioRepository;
use App\Contracts\HistoricoLocalPatrimonioContract;
use App\Repositories\HorarioRepository;
use App\Contracts\HorarioContract;
use App\Repositories\ImagemAgendamentoRepository;
use App\Contracts\ImagemAgendamentoContract;
use App\Repositories\ImagemLaudoRepository;
use App\Contracts\ImagemLaudoContract;
use App\Repositories\InterrupcaoAgendaRepository;
use App\Contracts\InterrupcaoAgendaContract;
use App\Repositories\InventarioRepository;
use App\Contracts\InventarioContract;
use App\Repositories\ItemInventarioRepository;
use App\Contracts\ItemInventarioContract;
use App\Repositories\ItemMovimentacaoEstoqueRepository;
use App\Contracts\ItemMovimentacaoEstoqueContract;
use App\Repositories\LaudoRepository;
use App\Contracts\LaudoContract;
use App\Repositories\LocalEstoqueRepository;
use App\Contracts\LocalEstoqueContract;
use App\Repositories\LogRepository;
use App\Contracts\LogContract;
use App\Repositories\MedicoRepository;
use App\Contracts\MedicoContract;
use App\Repositories\MedicoUnidadeSaudeRepository;
use App\Contracts\MedicoUnidadeSaudeContract;
use App\Repositories\MembroRepository;
use App\Contracts\MembroContract;
use App\Repositories\ModeloLaudoRepository;
use App\Contracts\ModeloLaudoContract;
use App\Repositories\ModeloPatrimonioRepository;
use App\Contracts\ModeloPatrimonioContract;
use App\Repositories\MotivoInterrupcaoRepository;
use App\Contracts\MotivoInterrupcaoContract;
use App\Repositories\MovimentacaoEstoqueRepository;
use App\Contracts\MovimentacaoEstoqueContract;
use App\Repositories\NotificacaoRepository;
use App\Contracts\NotificacaoContract;
use App\Repositories\NotificacaoUsuarioRepository;
use App\Contracts\NotificacaoUsuarioContract;
use App\Repositories\OcupacaoRepository;
use App\Contracts\OcupacaoContract;
use App\Repositories\OrgaoRepository;
use App\Contracts\OrgaoContract;
use App\Repositories\PacienteRepository;
use App\Contracts\PacienteContract;
use App\Repositories\PaisRepository;
use App\Contracts\PaisContract;
use App\Repositories\PatrimonioRepository;
use App\Contracts\PatrimonioContract;
use App\Repositories\PeriodoRepository;
use App\Contracts\PeriodoContract;
use App\Repositories\PeriodoMedicoRepository;
use App\Contracts\PeriodoMedicoContract;
use App\Repositories\PreparoExameRepository;
use App\Contracts\PreparoExameContract;
use App\Repositories\ProdutoRepository;
use App\Contracts\ProdutoContract;
use App\Repositories\ProdutoAgendamentoRepository;
use App\Contracts\ProdutoAgendamentoContract;
use App\Repositories\ProdutoExameRepository;
use App\Contracts\ProdutoExameContract;
use App\Repositories\RemarcacaoAgendamentoRepository;
use App\Contracts\RemarcacaoAgendamentoContract;
use App\Repositories\RevisaoLaudoRepository;
use App\Contracts\RevisaoLaudoContract;
use App\Repositories\SaldoEstoqueRepository;
use App\Contracts\SaldoEstoqueContract;
use App\Repositories\SolicitanteRepository;
use App\Contracts\SolicitanteContract;
use App\Repositories\SolicitanteUnidadeSaudeRepository;
use App\Contracts\SolicitanteUnidadeSaudeContract;
use App\Repositories\SugestaoRepository;
use App\Contracts\SugestaoContract;
use App\Repositories\UnidadeMedidaRepository;
use App\Contracts\UnidadeMedidaContract;
use App\Repositories\UnidadeMedidaProdutoRepository;
use App\Contracts\UnidadeMedidaProdutoContract;
use App\Repositories\UnidadeSaudeRepository;
use App\Contracts\UnidadeSaudeContract;
use App\Repositories\UnidadeSaudeRelacionadaRepository;
use App\Contracts\UnidadeSaudeRelacionadaContract;
use App\Repositories\UserRepository;
use App\Contracts\UserContract;
use App\Repositories\UsuarioEmpresaRepository;
use App\Contracts\UsuarioEmpresaContract;
use App\Repositories\UsuarioUnidadeSaudeRepository;
use App\Contracts\UsuarioUnidadeSaudeContract;

abstract class AppProviderMap
{
	const PROVIDERS = [
		AgendamentoContract::class => AgendamentoRepository::class,
		AgendamentoInativoContract::class => AgendamentoInativoRepository::class,
		AgendamentoMedicoContract::class => AgendamentoMedicoRepository::class,
		ApoiadorContract::class => ApoiadorRepository::class,
		ApontamentoContract::class => ApontamentoRepository::class,
		AreaContract::class => AreaRepository::class,
		CategoriaProdutoContract::class => CategoriaProdutoRepository::class,
		CepContract::class => CepRepository::class,
		CidContract::class => CidRepository::class,
		CidadeContract::class => CidadeRepository::class,
		ColaboradorContract::class => ColaboradorRepository::class,
		ColaboradorUnidadeSaudeContract::class => ColaboradorUnidadeSaudeRepository::class,
		ComentarioAgendamentoContract::class => ComentarioAgendamentoRepository::class,
		ConsorcioContract::class => ConsorcioRepository::class,
		DiagnosticoExameContract::class => DiagnosticoExameRepository::class,
		EmpresaContract::class => EmpresaRepository::class,
		EnderecoContract::class => EnderecoRepository::class,
		EquipeContract::class => EquipeRepository::class,
		EspecialidadeExameContract::class => EspecialidadeExameRepository::class,
		EspecialidadeExameMedicoContract::class => EspecialidadeExameMedicoRepository::class,
		EstoqueMinimoContract::class => EstoqueMinimoRepository::class,
		ExameContract::class => ExameRepository::class,
		ExameAgendamentoContract::class => ExameAgendamentoRepository::class,
		ExameComplementarContract::class => ExameComplementarRepository::class,
		ExameMedicoContract::class => ExameMedicoRepository::class,
		FabricanteContract::class => FabricanteRepository::class,
		FraseContract::class => FraseRepository::class,
		FraseAgendamentoContract::class => FraseAgendamentoRepository::class,
		FraseAgendamentoValorContract::class => FraseAgendamentoValorRepository::class,
		FraseExameContract::class => FraseExameRepository::class,
		FraseLaudoContract::class => FraseLaudoRepository::class,
		FraseLaudoValorContract::class => FraseLaudoValorRepository::class,
		FraseOrgaoContract::class => FraseOrgaoRepository::class,
		HistoricoContratoUnidadeContract::class => HistoricoContratoUnidadeRepository::class,
		HistoricoLocalPatrimonioContract::class => HistoricoLocalPatrimonioRepository::class,
		HorarioContract::class => HorarioRepository::class,
		ImagemAgendamentoContract::class => ImagemAgendamentoRepository::class,
		ImagemLaudoContract::class => ImagemLaudoRepository::class,
		InterrupcaoAgendaContract::class => InterrupcaoAgendaRepository::class,
		InventarioContract::class => InventarioRepository::class,
		ItemInventarioContract::class => ItemInventarioRepository::class,
		ItemMovimentacaoEstoqueContract::class => ItemMovimentacaoEstoqueRepository::class,
		LaudoContract::class => LaudoRepository::class,
		LocalEstoqueContract::class => LocalEstoqueRepository::class,
		LogContract::class => LogRepository::class,
		MedicoContract::class => MedicoRepository::class,
		MedicoUnidadeSaudeContract::class => MedicoUnidadeSaudeRepository::class,
		MembroContract::class => MembroRepository::class,
		ModeloLaudoContract::class => ModeloLaudoRepository::class,
		ModeloPatrimonioContract::class => ModeloPatrimonioRepository::class,
		MotivoInterrupcaoContract::class => MotivoInterrupcaoRepository::class,
		MovimentacaoEstoqueContract::class => MovimentacaoEstoqueRepository::class,
		NotificacaoContract::class => NotificacaoRepository::class,
		NotificacaoUsuarioContract::class => NotificacaoUsuarioRepository::class,
		OcupacaoContract::class => OcupacaoRepository::class,
		OrgaoContract::class => OrgaoRepository::class,
		PacienteContract::class => PacienteRepository::class,
		PaisContract::class => PaisRepository::class,
		PatrimonioContract::class => PatrimonioRepository::class,
		PeriodoContract::class => PeriodoRepository::class,
		PeriodoMedicoContract::class => PeriodoMedicoRepository::class,
		PreparoExameContract::class => PreparoExameRepository::class,
		ProdutoContract::class => ProdutoRepository::class,
		ProdutoAgendamentoContract::class => ProdutoAgendamentoRepository::class,
		ProdutoExameContract::class => ProdutoExameRepository::class,
		RemarcacaoAgendamentoContract::class => RemarcacaoAgendamentoRepository::class,
		RevisaoLaudoContract::class => RevisaoLaudoRepository::class,
		SaldoEstoqueContract::class => SaldoEstoqueRepository::class,
		SolicitanteContract::class => SolicitanteRepository::class,
		SolicitanteUnidadeSaudeContract::class => SolicitanteUnidadeSaudeRepository::class,
		SugestaoContract::class => SugestaoRepository::class,
		UnidadeMedidaContract::class => UnidadeMedidaRepository::class,
		UnidadeMedidaProdutoContract::class => UnidadeMedidaProdutoRepository::class,
		UnidadeSaudeContract::class => UnidadeSaudeRepository::class,
		UnidadeSaudeRelacionadaContract::class => UnidadeSaudeRelacionadaRepository::class,
		UserContract::class => UserRepository::class,
		UsuarioEmpresaContract::class => UsuarioEmpresaRepository::class,
		UsuarioUnidadeSaudeContract::class => UsuarioUnidadeSaudeRepository::class,
	];
}