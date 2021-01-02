<?php
/*
  Simple Facebook Pages Scrapper without using Facebook API
  By: Abdennacer Elbasri
  Web: wwww.elbasri.net
  Email: wwww.elbasri.net
*/
Class FbScrapper{
	public function scrappage($id = null, $query = null){
		if($id){
			$pageurl = "https://mbasic.facebook.com/".$id;
			$curldoc = $this->curlit($pageurl);

			if($curldoc != 1){
				return $curldoc;
			}
			else
				return false;
		}
		else
			return "You should provide a page id/username !";
	}
	public function curlit($url = null){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        $ret = 1;
        if ( ! $html = curl_exec($ch))  
        {                
            $ret = 1;
        }
        else
        {             
            curl_close($ch);
            
            $ret = $html;
            
        }
        return $ret;
    }
}
?>