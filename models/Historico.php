<?php
class Historico{
	private $id;
	private $horasTotAprov;
	private $horasTotPend;
	private $ensinoTotAprov;
	private $extensaoTotAprov;
	private $pesquisaTotAprov;
	private $ensino1Total;
    private $ensino2Total;
    private $ensino3Total;
    private $ensino4Total;
    private $extensao1Total;
    private $extensao2Total;
	private $extensao3Total;
	private $pesquisa1Total;
	private $pesquisa2Total;
    private $pesquisa3Total; 	
	private $aluno;
	private $planejamentos;
	
	public function __construct( ) {
		
		$this->planejamentos = array();
	}
	
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getHorasTotAprov(){
		return $this->horasTotAprov;
	}
	public function setHorasTotAprov($horasTotAprov){
		$this->horasTotAprov=$horasTotAprov;
	}
	public function getHorasTotPend(){
		return $this->horasTotPend;
	}
	public function setHorasTotPend($horasTotPend){
		$this->horasTotPend=$horasTotPend;
	}
	public function getEnsinoTotAprov(){
		return $this->ensinoTotAprov;
	}
	public function setEnsinoTotAprov($ensinoTotAprov){
		$this->ensinoTotAprov=$ensinoTotAprov;
	}
	public function getExtensaoTotAprov(){
		return $this->extensaoTotAprov;
	}
	public function setExtensaoTotAprov($extensaoTotAprov){
		$this->extensaoTotAprov=$extensaoTotAprov;
	}
	public function getPesquisaTotAprov(){
		return $this->pesquisaTotAprov;
	}
	public function setPesquisaTotAprov($pesquisaTotAprov){
		$this->pesquisaTotAprov = $pesquisaTotAprov;
	}
	
	public function getEnsino1Total(){
		return $this->ensino1Total;
	}
	public function setEnsino1Total($ensino1Total){
		$this->ensino1Total = $ensino1Total;
	}
	public function getEnsino2Total(){
		return $this->ensino2Total;
	}
	public function setEnsino2Total($ensino2Total){
		$this->ensino2Total = $ensino2Total;
	}
	public function getEnsino3Total(){
		return $this->ensino3Total;
	}
	public function setEnsino3Total($ensino3Total){
		$this->ensino3Total = $ensino3Total;
	}
	public function getEnsino4Total(){
		return $this->ensino4Total;
	}
	public function setEnsino4Total($ensino4Total){
		$this->ensino4Total = $ensino4Total;
	}
	public function getExtensao1Total(){
		return $this->extensao1Total;
	}
	public function setExtensao1Total($extensao1Total){
		$this->extensao1Total = $extensao1Total;
	}
    public function getExtensao2Total(){
		return $this->extensao2Total;
	}
	public function setExtensao2Total($extensao2Total){
		$this->extensao2Total = $extensao2Total;
	}
	public function getExtensao3Total(){
		return $this->extensao3Total;
	}
	public function setExtensao3Total($extensao3Total){
		$this->extensao3Total = $extensao3Total;
	}
	public function getPesquisa1Total(){
		return $this->pesquisa1Total;
	}
	public function setPesquisa1Total($pesquisa1Total){
		$this->pesquisa1Total = $pesquisa1Total;
	}
	public function getPesquisa2Total(){
		return $this->pesquisa2Total;
	}
	public function setPesquisa2Total($pesquisa2Total){
		$this->pesquisa2Total = $pesquisa2Total;
	}
	public function getPesquisa3Total(){
		return $this->pesquisa3Total;
	}
	public function setPesquisa3Total($pesquisa3Total){
		$this->pesquisa3Total = $pesquisa3Total;
	}
	
	
	public function setAluno( Aluno $aluno){
		$this->aluno= $aluno;
		
	}
	public function getAluno( ){
		return $this->aluno;
		
	}
	public function addPlanejamento( Planejamento $planejamento){
		$this->planejamentos[] = $planejamento;
	}
	public function getPlanejamentos() { 
     
	 return $this->planejamentos; 
    } 
	
	public function somarensinoTotAprov(){
		$this->ensinoTotAprov =  $this->ensino1Total + $this->ensino2Total + $this->ensino3Total + $this->ensino4Total;
	}
	public function somarextensaoTotAprov(){
		$this->extensaoTotAprov = $this->extensao1Total + $this->extensao2Total + $this->extensao3Total;
		
	}
	
	public function somarpesquisaTotAprov(){
		$this->pesquisaTotAprov = $this->pesquisa1Total + $this->pesquisa2Total + $this->pesquisa3Total;
	}
	
	public function somarhorasTotAprov(){
		$this->somarensinoTotAprov();
		$this->somarextensaoTotAprov();
		$this->somarpesquisaTotAprov();
		$this->horasTotAprov = $this->ensinoTotAprov + $this->extensaoTotAprov + $this->pesquisaTotAprov;
	}
	public function verificarhorasTotPend(){
		$this->horasTotPend = 100 - $this->horasTotAprov;
	}
	
}
interface historicoDAOInterface{
	
	public function buildHistorico($data);
	public function create(Historico $historico);
	public function updateHorasTotaisAprovadas(Historico $historico);
	public function updateHorasTotaisPendentes(Historico $historico);
	public function updateEnsinoTotAprov (Historico $historico);
	public function updateExtensaoTotAprov (Historico $historico);
	public function updatePesquisaTotAprov (Historico $historico);
	public function updateEnsino1Total (Historico $historico);
	public function updateEnsino2Total (Historico $historico);
	public function updateEnsino3Total (Historico $historico);
	public function updateEnsino4Total (Historico $historico);
	public function updateExtensao1Total (Historico $historico);
	public function updateExtensao2Total (Historico $historico);
	public function updateExtensao3Total (Historico $historico);
	public function updatePesquisa1Total (Historico $historico);
	public function updatePesquisa2Total (Historico $historico);
	public function updatePesquisa3Total (Historico $historico);
	public function findById($id);
	}
?>