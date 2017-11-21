<?php 
	class HTMLBuilder {
		public $header;
		public $body;
		public $footer;

		public function __construct($header, $body, $footer){
			$this->header = $header;
			$this->body = $body;
			$this->footer = $footer;

			$this->buildPage();
		}

		public function buildPage(){
			$this->buildHeader();
			$this->buildBody();
			$this->buildFooter();
		}

		public function buildHeader(){
			#buildCssLinks()
			$cssDirectory = dirname(dirname(__FILE__)) . '/css/';
			$cssFilesArray = $this->findFiles($cssDirectory, 'css');

			$cssLinks = $this->buildCssLinks($cssFilesArray);

			include 'html/' . $this->header;
		}

		public function buildBody(){
			include 'html/' . $this->body;
		}

		public function buildFooter(){
			#buildJsLinks()
			$jsDirectory = dirname(dirname(__FILE__)) . '/js/';
			$jsFilesArray = $this->findFiles($jsDirectory, 'js');

			$jsLinks = $this->buildJsLinks($jsFilesArray);
			include 'html/' . $this->footer;			
		}

		



		public function findFiles($directory, $fileExtension){
			return glob($directory . '/*.' . $fileExtension);
			#Returns an array containing the matched files/directories, an empty array if no file matched or FALSE on error.
		}

		protected function buildCssLinks($filesArray){
			$cssArray	=	array();
			
			foreach ($filesArray as $file) {
				$fileInfo	=	pathinfo($file);
				$fileName	=	$fileInfo['basename'];
				
				$cssArray[] = '<link rel="stylesheet" type="text/css" href="css/' . $fileName . '">';
			}
			return implode('', $cssArray);
		}
		
		protected function buildJsLinks($filesArray){
			$jsArray	=	array();
			
			foreach ($filesArray as $file) {
				$fileInfo	=	pathinfo($file);
				$fileName	=	$fileInfo['basename'];
				
				$jsArray[] = '<script src="js/' . $fileName . '"></script>';
			}
			return implode('', $jsArray);
		}

		

	}
?>