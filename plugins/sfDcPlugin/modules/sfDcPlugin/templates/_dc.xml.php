<oai_dc:dc
    xmlns:oai_dc="http://www.openarchives.org/OAI/2.0/oai_dc/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.openarchives.org/OAI/2.0/oai_dc/
    http://www.openarchives.org/OAI/2.0/oai_dc.xsd">

  <dc:title><?php echo esc_specialchars(strval($resource->title)) ?></dc:title>

  <?php foreach ($resource->getCreators() as $item): ?>
    <dc:creator><?php echo esc_specialchars(strval($item)) ?></dc:creator>
  <?php endforeach; ?>

<?php
    foreach ($dc->coverage as $locais)
    {
      foreach ($resource->getCreators() as $produtor)
      {
        foreach ($dc->subject as $assuntos)
        {
        }
      }
    }
    if (isset($resource->scopeAndContent) or isset($locais) or isset($produtor) or isset($assuntos))
    {
      echo "<dc:description>";
      echo esc_specialchars(strval($resource->scopeAndContent));
    }
    if (isset($resource->scopeAndContent))
    {
      echo " •";
    }
    if (isset($locais))
    {
      echo "\n\nÁreas geográficas e topónimos: ";
      echo esc_specialchars(strval($locais));
    }
    if (isset($locais) and isset($produtor))
    {
      echo "; ";
    }
    if (isset($produtor))
    {
      echo "\n\nPessoas: ";
      echo esc_specialchars(strval($produtor));
      echo " (Proveniência)";
    }
    if (isset($produtor) and isset($assuntos) or isset($locais) and isset($assuntos))
    {
      echo "; ";
    }
    if (isset($assuntos))
    {
      echo "\n\nAssuntos: ";
      echo esc_specialchars(strval($assuntos));
    }
    if (isset($locais) or isset($produtor) or isset($assuntos))
    {
      echo ".";
    }
    if (isset($resource->scopeAndContent) or isset($locais) or isset($produtor) or isset($assuntos))
    {
      echo "</dc:description>";
    }
  ?>

  <dc:description><?php echo esc_specialchars(strval($resource->scopeAndContent)) ?></dc:description>

  <?php foreach ($resource->getPublishers() as $item): ?>
    <dc:publisher><?php echo esc_specialchars(strval($item)) ?></dc:publisher>
  <?php endforeach; ?>

  <?php foreach ($resource->getContributors() as $item): ?>
    <dc:contributor><?php echo esc_specialchars(strval($item)) ?></dc:contributor>
  <?php endforeach; ?>

  <?php foreach ($dc->date as $item): ?>
    <dc:date><?php echo esc_specialchars(strval($item)) ?></dc:date>
  <?php endforeach; ?>

  <?php foreach ($dc->type as $item): ?>
    <dc:type><?php echo esc_specialchars(strval($item)) ?></dc:type>
  <?php endforeach; ?>

  <?php if (isset($resource->extentAndMedium)) {
  echo "<dc:format>";
  echo esc_specialchars(strval($resource->extentAndMedium));
  echo "</dc:format>";
  }
  ?>

  <dc:identifier><?php echo esc_specialchars(sfConfig::get('app_siteBaseUrl') .'/'.$resource->slug) ?></dc:identifier>

  <dc:identifier><?php echo esc_specialchars(strval($resource->identifier)) ?></dc:identifier>

  <dc:source><?php echo esc_specialchars(strval($resource->locationOfOriginals)) ?></dc:source>

  <?php foreach ($resource->language as $code): ?>
    <dc:language xsi:type="dcterms:ISO639-3"><?php echo esc_specialchars(strval(strtolower($iso639convertor->getID3($code)))) ?></dc:language>
  <?php endforeach; ?>

  <?php if (isset($resource->repository)): ?>
    <dc:relation><?php echo esc_specialchars(url_for(array($resource->repository, 'module' => 'repository'), true)) ?></dc:relation>
    <dc:relation><?php echo esc_specialchars(strval($resource->repository->authorizedFormOfName)) ?></dc:relation>
  <?php endif; ?>

  <?php foreach ($dc->coverage as $item): ?>
    <dc:coverage><?php echo esc_specialchars(strval($item)) ?></dc:coverage>
  <?php endforeach; ?>

  <dc:rights><?php echo esc_specialchars(strval($resource->accessConditions)) ?></dc:rights>

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
    
</oai_dc:dc>
