<?php 
/**
 * REZO ZERO CMS
 *
 * =====================
 * Do not edit bellow !!
 * =====================
 */
use InlineStyle\InlineStyle; // InlineStyle library will parse CSS styles to inject them into HTML tags

error_reporting(E_ALL ^ E_NOTICE);

$body = "";

/*
 * ============================================================================
 * To use MVC newsletter building scheme 
 * Include your own autoloader here and initialize Twig
 * 
 * If your newsletter does not use Blocks, this part is optional
 * ============================================================================
 */
rz_twig_tools::init(dirname(__FILE__));
include_once (dirname(__FILE__)."/autoload.class.php"); 

$newsletterAssignation = $nl->prepareBaseAssignation( $email );

/*
 * === Prepare HERE your blocks or newsletter data
 */
$newsletterAssignation['node'] = $nl->getNode();
$newsletterAssignation['blocks'] = array();
// etc

/*
 * =====================
 * Do not edit bellow !!
 * =====================
 */
$body = rz_twig_tools::render( "nl_example_newsletter.html.twig", $newsletterAssignation );

if (rz_mailer::includeCssSelector()) {
	$htmldoc = new InlineStyle($body);
	// Apply external stylesheet to prevent removing media queries !
	// Be sure to create to following stylesheet in your template css folder.
	$htmldoc->applyStylesheet(file_get_contents(dirname(__FILE__)."/css/nl_example_newsletter.css"));
	// OR Use current file styles and remove any style tags
	$htmldoc->applyStylesheet($htmldoc->extractStylesheets());

	$body = $htmldoc->getHTML();
}