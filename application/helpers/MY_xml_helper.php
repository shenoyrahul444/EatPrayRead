
	

<!--I believe the most practical, logical and error free way to generate an XML is to create a DOMDocument as suggested by Eineki in this answer, allowing the xmltree to be searched through an xpath query.

With this said, some years ago Dan Simmons created a single MY_xml_helper.php that you can just copy to your application/helpers folder directly. Here's the entire code without comments:

Hide code snippet-->

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('xml_dom'))
{
	function xml_dom()
	{
		return new DOMDocument('1.0', 'UTF-8');
	}
}

if ( ! function_exists('xml_add_child'))
{
	function xml_add_child($parent, $name, $value = NULL, $cdata = FALSE)
	{
		if($parent->ownerDocument != "")
		{
			$dom = $parent->ownerDocument;			
		}
		else
		{
			$dom = $parent;
		}
		
		$child = $dom->createElement($name);		
		$parent->appendChild($child);
		
		if($value != NULL)
		{
			if ($cdata)
			{
				$child->appendChild($dom->createCdataSection($value));
			}
			else
			{
				$child->appendChild($dom->createTextNode($value));
			}
		}
		
		return $child;		
	}
}


if ( ! function_exists('xml_add_attribute'))
{
	function xml_add_attribute($node, $name, $value = NULL)
	{
		$dom = $node->ownerDocument;			
		
		$attribute = $dom->createAttribute($name);
		$node->appendChild($attribute);
		
		if($value != NULL)
		{
			$attribute_value = $dom->createTextNode($value);
			$attribute->appendChild($attribute_value);
		}
		
		return $node;
	}
}


if ( ! function_exists('xml_print'))
{
	function xml_print($dom, $return = FALSE)
	{
		$dom->formatOutput = TRUE;
		$xml = $dom->saveXML();
		if ($return)
		{
			return $xml;
		}
		else
		{
			echo $xml;
		}
	}
}