<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_HeaderEncoder_Base64HeaderEncoder extends Swift_Encoder_Base64Encoder implements Swift_Mime_HeaderEncoder
{
 public function getName()
 {
 return 'B';
 }
 public function encodeString($string, $firstLineOffset = 0, $maxLineLength = 0, $charset = 'utf-8')
 {
 if ('iso-2022-jp' === \strtolower($charset ?? '')) {
 $old = \mb_internal_encoding();
 \mb_internal_encoding('utf-8');
 $newstring = \mb_encode_mimeheader($string, $charset, $this->getName(), "\r\n");
 \mb_internal_encoding($old);
 return $newstring;
 }
 return parent::encodeString($string, $firstLineOffset, $maxLineLength);
 }
}
