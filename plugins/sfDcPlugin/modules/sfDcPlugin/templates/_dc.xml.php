<oai_dc:dc
    xmlns:oai_dc="http://www.openarchives.org/OAI/2.0/oai_dc/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.openarchives.org/OAI/2.0/oai_dc/
    http://www.openarchives.org/OAI/2.0/oai_dc.xsd">

  <?php
    foreach ($resource->getNotesByType(array(
      'noteTypeId' => QubitTerm::GENERAL_NOTE_ID
    )) as $notas)
    {
    }
    if ((!isset($resource->title) and (strpos(strval($resource->levelOfDescription), 'omposto') == true or $rest = 
substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "DC")) or (esc_specialchars(strval($resource->title) == 
esc_specialchars(strval($dc->identifier)) and (strpos(strval($resource->levelOfDescription), 'omposto') == true or $rest = 
substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "DC"))))
    {
      echo "<dc:title>" . "[Sem título]" . "</dc:title>";
    }
    elseif ($rest = substr(esc_specialchars(strval($resource->title)), 0, 1) == "[" and $rest = substr(esc_specialchars(strval($resource->title)), -1) == "]" and 
esc_specialchars(strval($resource->title)) != "[Sem título]" and esc_specialchars(strval($resource->title)) != "[Sem título, contendo dados não identificáveis]")
    {
      echo "<dc:title>" . "[" . substr(esc_specialchars(strval($resource->title)), 1, -1) . "]" . "</dc:title>";
    }
    elseif ($rest = substr(esc_specialchars(strval($resource->title)), -18) == "ítulo atribuído]" or $rest = substr(esc_specialchars(strval($resource->title)), -18) 
== "ítulo atribuído)" or $rest = substr(esc_specialchars(strval($resource->title)), -18) == "ítulo atribuído)" or $rest = 
substr(esc_specialchars(strval($resource->title)), -18) == "ítulo Atribuído)" or $rest = substr(esc_specialchars(strval($resource->title)), -18) == "ítulo 
atribuído]")
    {
      echo "<dc:title>" . "[" . substr(esc_specialchars(strval($resource->title)), 0, -21) . "]" . "</dc:title>";
    }
    elseif ($rest = substr(esc_specialchars(strval($resource->title)), -10) == "tribuído]" or $rest = substr(esc_specialchars(strval($resource->title)), -10) == 
"tribuído)")
    {
      echo "<dc:title>" . "[" . substr(esc_specialchars(strval($resource->title)), 0, -13) . "]" . "</dc:title>";
    }
    elseif (strpos(strval($notas), 'ítulo atribuído') != false and $rest = substr(esc_specialchars(strval($resource->title)), 0, 1) !== "[" and $rest = 
substr(esc_specialchars(strval($resource->title)), -1) != "]" and $rest = substr(esc_specialchars(strval($resource->title)), -10) != "tribuído]" and $rest = 
substr(esc_specialchars(strval($resource->title)), -10) != "tribuído)")
    {
      echo "<dc:title>" . "[" . esc_specialchars(strval($resource->title)) . "]" . "</dc:title>";
    }
    else
    {
      echo "<dc:title>" . esc_specialchars(strval($resource->title)) . "</dc:title>";
    }
  ?>

  <?php
    foreach ($dc->subject as $assuntos)
    {
    }
    foreach ($dc->coverage as $locais)
    {
    }
    foreach ($resource->scopeAndContent as $ambito)
    {
    }
    if (isset($ambito) or isset($locais) or isset($assuntos))
    {
      echo "<dc:subject>";
      echo esc_specialchars(strval($resource->scopeAndContent));
    }
    if (isset($locais) and isset($resource->scopeAndContent) or ($assuntos) and isset($resource->scopeAndContent))
    {
      echo " •";
    }
    if (isset($locais))
    {
      echo "\n\nÁreas geográficas e topónimos: ";
      echo esc_specialchars(strval($locais));
    }
    if (isset($locais) and isset($assuntos))
    {
      echo " • ";
    }
    if (isset($assuntos))
    {
      echo "\n\nAssuntos: ";
      echo esc_specialchars(strval($assuntos));
    }
    if (isset($assuntos))
    {
      echo ".";
    }
    if (isset($ambito) or isset($locais) or isset($assuntos))
    {
      echo "</dc:subject>";
    }
  ?>

  <?php
    if (isset($resource->repository)) {
      echo "<dc:publisher>";
      echo esc_specialchars(strval($resource->repository->authorizedFormOfName));
      echo "</dc:publisher>";
      if (!isset($resource->repository) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/'))) != false or 
strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB '))) != false) {
        echo "<dc:publisher>Câmara Municipal de Albergaria-a-Velha</dc:publisher>";
        if (!isset($resource->repository) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/AMALB/'))) != false or 
strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT AMALB '))) != false) {
          echo "<dc:publisher>Arquivo Municipal de Albergaria-a-Velha</dc:publisher>";
        }
      }
    } else {
      echo "<dc:publisher>Câmara Municipal de Albergaria-a-Velha</dc:publisher>";
    }
  ?>

  <?php
    foreach ($resource->getDates() as $item)
    {
      foreach ($dc->date as $itemx)
      {
      }
    }
    if (strlen(Qubit::renderDate($item->startDate)) > 4 and strlen(Qubit::renderDate($item->startDate)) < 10 and ($rest = 
substr(esc_specialchars(strval(Qubit::renderDate($item->startDate))), 3, 1) == "-" or $rest = substr(esc_specialchars(strval(Qubit::renderDate($item->startDate))), 
4, 1) == "-" or $rest = substr(esc_specialchars(strval(Qubit::renderDate($item->startDate))), 6, 1) == "-"))
    {
      echo "<dc:date>" . date('Y-m-d', strtotime(Qubit::renderDate($item->startDate))) . "</dc:date>";
    }
    elseif (strlen(Qubit::renderDate($item->startDate)) == 3 and strlen(strval($itemx)) > 3 and $rest = substr(strval($itemx), 0, 1) == "[" and $rest = 
substr(strval($itemx), 4, 1) == "-")
    {
      echo "<dc:date>" . Qubit::renderDate($item->startDate) . "0" . "</dc:date>";
    }
    elseif (strlen(Qubit::renderDate($item->startDate)) < 3)
    {
    }
    else
    {
      if (isset($item->startDate))
      {
        echo "<dc:date>";
      }
      echo Qubit::renderDate($item->startDate);
      if (isset($item->startDate))
      {
        echo "</dc:date>";
      }
    }
  ?>

  <?php
    foreach ($resource->getDates() as $item)
    {
      foreach ($dc->date as $itemx)
      {
      }
    }
    if (strlen(Qubit::renderDate($item->endDate)) > 4 and strlen(Qubit::renderDate($item->endDate)) < 10 and ($rest = 
substr(esc_specialchars(strval(Qubit::renderDate($item->endDate))), 3, 1) == "-" or $rest = substr(esc_specialchars(strval(Qubit::renderDate($item->endDate))), 4, 
1) == "-" or $rest = substr(esc_specialchars(strval(Qubit::renderDate($item->endDate))), 6, 1) == "-"))
    {
      echo "<dc:date>" . date('Y-m-d', strtotime(Qubit::renderDate($item->endDate))) . "</dc:date>";
    }
    elseif (strlen(Qubit::renderDate($item->endDate)) == 3 and strlen(strval($itemx)) > 3 and $rest = substr(strval($itemx), 4, 2) == "-]")
    {
      echo "<dc:date>" . Qubit::renderDate($item->endDate) . "0" . "</dc:date>";
    }
    elseif (strlen(Qubit::renderDate($item->endDate)) < 3)
    {
    }
    else
    {
      if (isset($item->endDate))
      {
        echo "<dc:date>";
      }
      echo Qubit::renderDate($item->endDate);
      if (isset($item->endDate))
      {
        echo "</dc:date>";
      }
    }
  ?>

  <?php
    foreach ($dc->date as $item1) {
    }
    foreach ($resource->getDates() as $item2) {
    }
    if (!isset($item1) and !isset($item2->startDate) and !isset($item2->endDate)) {
      echo "<dc:date>[19--]</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) or isset($item1) and isset($item2->startDate) and isset($item2->endDate) and 
esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . "-" . Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != 
Qubit::renderDate($item2->startDate) . " - " . Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . "/" 
. Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . " / " . Qubit::renderDate($item2->endDate) and 
esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . "," . Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != 
Qubit::renderDate($item2->startDate) . ", " . Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . " " 
. Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) . esc_specialchars(strval($item1)) != Qubit::renderDate($item2->endDate) . 
Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) . esc_specialchars(strval($item1)) != Qubit::renderDate($item2->endDate) . "-" . 
Qubit::renderDate($item2->endDate) . "-" or isset($item1) and isset($item2->startDate) and !isset($item2->endDate) and esc_specialchars(strval($item1)) != 
Qubit::renderDate($item2->startDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . "-" . Qubit::renderDate($item2->startDate) and 
esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . " - " . Qubit::renderDate($item2->startDate) and esc_specialchars(strval($item1)) != 
Qubit::renderDate($item2->startDate) . "/" . Qubit::renderDate($item2->startDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . " / 
" . Qubit::renderDate($item2->startDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . "," . Qubit::renderDate($item2->startDate) 
and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . ", " . Qubit::renderDate($item2->startDate) and esc_specialchars(strval($item1)) != 
Qubit::renderDate($item2->startDate) . " " . Qubit::renderDate($item2->startDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->startDate) . "-" 
or isset($item1) and !isset($item2->startDate) and isset($item2->endDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->endDate) and 
esc_specialchars(strval($item1)) != Qubit::renderDate($item2->endDate) . "-" . Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != 
Qubit::renderDate($item2->endDate) . " - " . Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->endDate) . "/" . 
Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->endDate) . " / " . Qubit::renderDate($item2->endDate) and 
esc_specialchars(strval($item1)) != Qubit::renderDate($item2->endDate) . "," . Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != 
Qubit::renderDate($item2->endDate) . ", " . Qubit::renderDate($item2->endDate) and esc_specialchars(strval($item1)) != Qubit::renderDate($item2->endDate) . " " . 
Qubit::renderDate($item2->endDate)) {
      if (strlen(Qubit::renderDate($item2->startDate)) > 6 and strlen(Qubit::renderDate($item2->startDate)) < 10 and strlen(Qubit::renderDate($item2->endDate)) > 6 
and strlen(Qubit::renderDate($item2->endDate)) < 10 and strlen(date('Y-m-d', strtotime(Qubit::renderDate($item2->startDate)))) == 10 and strlen(date('Y-m-d', 
strtotime(Qubit::renderDate($item2->endDate)))) == 10 and esc_specialchars(strval($item1)) != date('Y-m-d', strtotime(Qubit::renderDate($item2->startDate))) . "-" . 
date('Y-m-d', strtotime(Qubit::renderDate($item2->endDate))) and esc_specialchars(strval($item1)) != date('Y-m-d', strtotime(Qubit::renderDate($item2->startDate))) 
. " - " . date('Y-m-d', strtotime(Qubit::renderDate($item2->endDate))) and esc_specialchars(strval($item1)) != date('Y-m-d', 
strtotime(Qubit::renderDate($item2->startDate))) . "/" . date('Y-m-d', strtotime(Qubit::renderDate($item2->endDate))) and esc_specialchars(strval($item1)) != 
date('Y-m-d', strtotime(Qubit::renderDate($item2->startDate))) . " / " . date('Y-m-d', strtotime(Qubit::renderDate($item2->endDate))) and 
esc_specialchars(strval($item1)) != date('Y-m-d', strtotime(Qubit::renderDate($item2->startDate))) . "," . date('Y-m-d', 
strtotime(Qubit::renderDate($item2->endDate))) and esc_specialchars(strval($item1)) != date('Y-m-d', strtotime(Qubit::renderDate($item2->startDate))) . ",  " . 
date('Y-m-d', strtotime(Qubit::renderDate($item2->endDate))) and esc_specialchars(strval($item1)) != date('Y-m-d', strtotime(Qubit::renderDate($item2->startDate))) 
. " " . date('Y-m-d', strtotime(Qubit::renderDate($item2->endDate)))) {
        echo "<dc:date1>";
        if ((strlen($item1) == 6 and substr_count($item1, "-") == 1 and substr(esc_specialchars(strval($item1)), 4, 1) == "-" and 
substr(esc_specialchars(strval($item1)), 0, 1) != "[") or (strlen($item1) == 7 and substr_count($item1, "-") == 1 and substr(esc_specialchars(strval($item1)), 4, 1) 
== "-") or (strlen($item1) > 7 and strlen($item1) < 11 and substr_count($item1, "-") == 2 and substr(esc_specialchars(strval($item1)), 4, 1) == "-") or 
(strlen($item1) > 7 and strlen($item1) < 11 and substr_count($item1, "/") == 2 and substr(esc_specialchars(strval($item1)), 4, 1) == "/") or (strlen($item1) > 7 and 
strlen($item1) < 11 and substr_count($item1, ".") == 2 and substr(esc_specialchars(strval($item1)), 4, 1) == ".") or (strlen($item1) > 7 and strlen($item1) < 11 and 
substr_count($item1, "-") == 2 and substr(esc_specialchars(strval($item1)), 1, 1) == "-") or (strlen($item1) > 7 and strlen($item1) < 11 and substr_count($item1, 
"/") == 2 and substr(esc_specialchars(strval($item1)), 1, 1) == "/") or (strlen($item1) > 7 and strlen($item1) < 11 and substr_count($item1, ".") == 2 and 
substr(esc_specialchars(strval($item1)), 1, 1) == ".") or (strlen($item1) > 7 and strlen($item1) < 11 and substr_count($item1, "-") == 2 and 
substr(esc_specialchars(strval($item1)), 2, 1) == "-") or (strlen($item1) > 7 and strlen($item1) < 11 and substr_count($item1, "/") == 2 and 
substr(esc_specialchars(strval($item1)), 2, 1) == "/") or (strlen($item1) > 7 and strlen($item1) < 11 and substr_count($item1, ".") == 2 and 
substr(esc_specialchars(strval($item1)), 2, 1) == ".")) {
          echo date('Y-m-d', strtotime($item1));
        } else {
          echo esc_specialchars(strval($item1));
        }
        echo "</dc:date1>";
      }
    }
  ?>

  <?php
    if (isset($resource->levelOfDescription))
    {
      echo "<dc:type>";
      if (strpos(strval($resource->levelOfDescription), 'ub') != true and (esc_specialchars(strval($resource->levelOfDescription)) == "Colecção" or $rest = 
substr(esc_specialchars(strval($resource->levelOfDescription)), -6) == " Fundo" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -6) == " 
fundo" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -8) == "gregação" or esc_specialchars(strval($resource->levelOfDescription)) == 
"Col. F"))
      {
        echo "Coleção";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'arquivo') != false)
      {
        echo substr(esc_specialchars(strval($resource->levelOfDescription)), 0, -7) . "fundo";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'ub') != true and ($rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -4) == "undo" 
or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -6) == "rquivo") or $rest = 
substr(esc_specialchars(strval($resource->levelOfDescription)), -1) == "F")
      {
        echo "Fundo";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'ub') != true and ($rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -5) == 
"ecção") or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "SC")
      {
        echo "Secção";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'ub') != true and $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -3) == "rie" 
or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "SR" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), 
-7) == "Col. SR")
      {
        echo "Série";
      }
      elseif ($rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -8) == "stalação" or $rest = 
substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "UI")
      {
        echo "Unidade de instalação";
      }
      elseif ($rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -7) == "omposto" or $rest = 
substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "DC")
      {
        echo "Documento composto";
      }
      elseif (esc_specialchars(strval($resource->levelOfDescription)) == "Documento" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -6) 
== "imples" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "DS")
      {
        echo "Documento simples";
      }
      else
      {
        echo esc_specialchars(strval($resource->levelOfDescription));
      }
      echo "</dc:type>";
    }
  ?>

  <?php
    if (isset($resource->extentAndMedium))
    {
      echo "<dc:format>";
      echo esc_specialchars(strval($resource->extentAndMedium));
      echo "</dc:format>";
    }
  ?>

  <dc:identifier><?php
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on")
    {
      echo "https://";
    }
    else
    {
      echo "http://";
    }
    echo esc_specialchars($sf_request->getHost() . $sf_request->getRelativeUrlRoot() . '/' . $resource->slug);
?></dc:identifier>

  <?php
    if (isset($resource->identifier))
    {
      echo "<dc:identifier>";
      echo esc_specialchars(strval($dc->identifier));
      echo "</dc:identifier>";
    }
  ?>

  <dc:language xsi:type="dcterms:ISO639-3"><?php foreach ($resource->language as $code) {} if (isset($code)) {echo 
esc_specialchars(strval(strtolower($iso639convertor->getID3($code)))); } else {echo "por";} ?></dc:language>

  <?php
    foreach ($resource->digitalObjects as $digitalObject)
    {
      foreach ($dc->type as $registosonoro)
      {
      }
    }
    if (isset($resource->digitalObjects[0]) and $registosonoro != "sound")
    {
      echo "<dc:relation>";
      if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on")
      {
        echo "https://";
      }
      else
      {
        echo "http://";
      }
      echo $sf_request->getHost() . $sf_request->getRelativeUrlRoot() . $digitalObject->path . $digitalObject->getChildByUsageId(QubitTerm::THUMBNAIL_ID);
      echo "</dc:relation>";
    }
    elseif (isset($resource->digitalObjects[0]) and $registosonoro == "sound")
    {
      echo "<dc:relation>https://raw.githubusercontent.com/artefactual/atom/stable/2.4.x/images/generic-icons/audio.png</dc:relation>";
    }
  ?>

  <?php
    if (isset($resource->accessConditions))
    {
      echo "<dc:rights>";
      echo esc_specialchars(strval($resource->accessConditions));
      echo "</dc:rights>";
    }
  ?>

  <?php
    foreach ($resource->getCreators() as $item) {
    }
    if (isset($item)) {
      echo "<dc:creator>";
      echo esc_specialchars(strval($item));
      echo "</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/ACALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB ACALB/'))) != false) {
      echo "<dc:creator>Administração do Concelho de Albergaria-a-Velha. 1835-1927</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/ACANG/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB ACANG/'))) != false) {
      echo "<dc:creator>Administração do Concelho de Angeja</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/AMALB/RHALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT AMALB RHALB/'))) != false) {
      echo "<dc:creator>Real Hospital de Albergaria-a-Velha</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/AFALB02/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB AFALB02/'))) != false) {
      echo "<dc:creator>Assembleia de Freguesia de Alquerubim</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/AFALB05/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB AFALB05/'))) != false) {
      echo "<dc:creator>Assembleia de Freguesia de Frossos</dc:creator>";
    }
	if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/AMALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB AMALB/'))) != false) {
      echo "<dc:creator>Assembleia Municipal de Albergaria-a-Velha</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CMALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CMALB/'))) != false) {
      echo "<dc:creator>Câmara Municipal de Albergaria-a-Velha</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CMANG/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CMANG/'))) != false) {
      echo "<dc:creator>Câmara Municipal de Angeja</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CMPAU/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CMPAU/'))) != false) {
      echo "<dc:creator>Câmara Municipal de Paus</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CMPIN/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CMPIN/'))) != false) {
      echo "<dc:creator>Câmara Municipal de Pinheiro</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CRJALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CRJALB/'))) != false) {
      echo "<dc:creator>Comissão de Recenseamento dos Jurados de Albergaria-a-Velha</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CREALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CREALB/'))) != false) {
      echo "<dc:creator>Comissão do Recenseamento Eleitoral de Albergaria-a-Velha</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CRMALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CRMALB/'))) != false) {
      echo "<dc:creator>Comissão do Recenseamento Militar de Albergaria-a-Velha. 1888-1937</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CMAAALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CMAAALB/'))) != false) {
      echo "<dc:creator>Comissão Municipal de Arte e Arqueologia de Albergaria-a-Velha. 1954-1977</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CMAALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CMAALB/'))) != false) {
      echo "<dc:creator>Comissão Municipal de Assistência de Albergaria-a-Velha</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CMHALB'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CMHALB/'))) != false) {
      echo "<dc:creator>Comissão Municipal de Higiene de Albergaria-a-Velha</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CVCALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CVCALB/'))) != false) {
      echo "<dc:creator>Comissão Venatória Concelhia de Albergaria-a-Velha</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CNMALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CNMALB/'))) != false) {
      echo "<dc:creator>Conselho Municipal de Albergaria-a-Velha</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/JFALB02/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB JFALB02/'))) != false) {
      echo "<dc:creator>Junta de Freguesia de Alquerubim</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/JFALB04/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB JFALB04/'))) != false) {
      echo "<dc:creator>Junta de Freguesia de Branca</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/JFALB05/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB JFALB05/'))) != false) {
      echo "<dc:creator>Junta de Freguesia de Frossos</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/EEPEALB02/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB EEPEALB02/'))) != false) {
      echo "<dc:creator>Escola de Ensino Primário Elementar da Freguesia de Alquerubim</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/EPVSR/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB EPVSR/'))) != false) {
      echo "<dc:creator>Escola Primária de Vilarinho de São Roque</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CFRS/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CFRS/'))) != false) {
      echo "<dc:creator>Comenda de Frossos</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/JOJPAU/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB JOJPAU/'))) != false) {
      echo "<dc:creator>Juízo Ordinário do Julgado de Paus</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/AHBVALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB AHBVALB/'))) != false) {
      echo "<dc:creator>Associação Humanitária dos Bombeiros Voluntários de Albergaria-a-Velha</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CLA/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CLA/'))) != false) {
      echo "<dc:creator>Clube de Albergaria</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/SCA/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB SCA/'))) != false) {
      echo "<dc:creator>Sport Clube Alba</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CTA/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CTA/'))) != false) {
      echo "<dc:creator>Cine-Teatro Alba, Lda.</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CCC/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CCC/'))) != false) {
      echo "<dc:creator>Companhia de Celulose do Caima</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/CCSA/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB CCSA/'))) != false) {
      echo "<dc:creator>Cooperativa de Comunicação Social de Albergaria</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/FMA/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB FMA/'))) != false) {
      echo "<dc:creator>Fábricas Metalúrgicas Alba</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/FGALB/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB FGALB/'))) != false) {
      echo "<dc:creator>Foto Gomes. 1935-</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/AO/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB AO/'))) != false) {
      echo "<dc:creator>O Arauto de Osseloa</dc:creator>";
	}
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/FAPS/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB FAPS/'))) != false) {
      echo "<dc:creator>Fernando Augusto Pereira da Silva</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/JFP/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB JFP/'))) != false) {
      echo "<dc:creator>Pinto, João Ferreira. 1895-1961, fotógrafo amador</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/JGS/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB JGS/'))) != false) {
      echo "<dc:creator>Soares, João Gomes. 1882-1935, desenhador</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/JBSC/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB JBSC/'))) != false) {
      echo "<dc:creator>Cabral, José Bernardo da Silva. 1801-1869</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/MS/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB MS/'))) != false) {
      echo "<dc:creator>Silva, Miguel da. 1864-[post. 1920], moleiro</dc:creator>";
    }
	if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/RJSPP/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB RJSPP/'))) != false) {
      echo "<dc:creator>Pinto, Rui Jorge da Silva Pereira. [19--]- , albergariense</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/VFS/'))) != false or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB VFS/'))) != false) {
      echo "<dc:creator>Silva, Vicente Ferreira da. 1918-2008, encarregado geral</dc:creator>";
    }
    if (!isset($item) and strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/NI/')) != false) or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT/CMALB/RDALB/')) != false) or strpos("###" . esc_specialchars(strval($dc->identifier)), 
esc_specialchars(strval('##PT/CMALB/BPALB/')) != false) or strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB NI/')) != 
false) or strpos("###" . esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB RDALB/')) != false) or strpos("###" . 
esc_specialchars(strval($dc->identifier)), esc_specialchars(strval('##PT CMALB BPALB/')) != false)) {
      echo "<dc:creator>Câmara Municipal de Albergaria-a-Velha. 1835-</dc:creator>";
    }
  ?>

</oai_dc:dc>
