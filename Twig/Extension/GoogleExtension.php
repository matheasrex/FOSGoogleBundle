<?php

/*
 * This file is part of the FOSGoogleBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\GoogleBundle\Twig\Extension;
use FOS\GoogleBundle\Templating\Helper\GoogleHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GoogleExtension extends \Twig_Extension
{
  protected $container;
  
  /**
   * Constructor.
   *
   * @param ContainerInterface $container
   */
  
  public function __construct( ContainerInterface $container )
  {
    $this->container = $container;
  }
  
  /**
   * Returns a list of global functions to add to the existing list.
   *
   * @return array An array of global functions
   */
  
  public function getFunctions( )
  {
    $functions = array( );
    $functions[ 'google_login_button' ] = new \Twig_Function_Method( $this, 'renderLoginButton');
    $functions[ 'google_login_url' ] = new \Twig_Function_Method( $this, 'renderLoginUrl');
    return $functions;
  }
  
  /**
   * @see GoogleHelper::loginButton()
   */
  
  public function renderLoginButton( $parameters = array( ), $name = null )
  {
    $helper = $this->container->get( 'fos_google.helper' );
    return $helper->loginButton( $parameters, $name ? : 'FOSGoogleBundle::loginButton.html.twig' );
  }
  
  /**
   * @see GoogleHelper::loginUrl()
   */
  
  public function renderLoginUrl( $parameters = array( ), $name = null )
  {
    $helper = $this->container->get( 'fos_google.helper' );
    return $helper->loginUrl( );
  }
  
  /**
   * Returns the name of the extension.
   *
   * @return string The extension name
   */
  
  public function getName( )
  {
    return 'google';
  }
}
