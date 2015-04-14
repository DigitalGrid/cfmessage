<?php

namespace Chja\Cfmessage;

/**
 * Class for flashing messages
 */
class Cfmessage
{
	
	private $sessionKey = null;
	
	
	/**
	 * Store session key
	 */
	public function __construct()
	{
		$sessionKey = 'Cfmessage';
	}
	
	
	/**
	 * Adds a message to the session
	 *
	 * @param $type The type could be info, warning, success or error
	 * @param $content The message
	 *
	 * @return void
	 */
	public function addMessage($type, $content)
	{
		if(isset($_SESSION[])) {
			$messages = $_SESSION[$this->sessionKey];
		}
		
		$messages[] = [
			'content' => $content,
			'type' => $type,
		];
		
		$_SESSION[$this->sessionKey] = $messages;
	}
	
	/**
	 * Adds a success message
	 *
	 * @param $content The message
	 *
	 * @return void
	 */
	public function addSuccess($content)
	{
		$content = '<i class="fa fa-check"></i> ' . $content;
		$this->addMessage('Success', $content);
	}
	 
	
	/**
	 * Adds an error message
	 *
	 * @param $conent The message
	 *
	 * @return void
	 */
	public function addError($content)
	{
		$content = '<i class="fa fa-times"></i> ' . $content;
		$this->addMessage('Error', $content);
	}
	
	
	/**
	 * Adds a warning message
	 *
	 * @param $content The message
	 *
	 * @return void
	 */
	public function addWarning($content)
	{
		$content = '<i class="fa fa-warning"></i> ' . $content;
		$this->addMessage('Warning', $content);
	}
	
	
	/**
	 * Adds a notice message
	 * 
	 * @param $content The message
	 *
	 * @return void
	 */
	public function addNotice($content)
	{
		$content = '<i class="fa fa-info"></i> ' . $content;
		$this->addMessage("info", $content);
	}
	
	
	/**
	 * Print out all messages
	 *
	 * @return $html All stored messages
	 */
	public function printMessage()
	{
		$messages = $_SESSION[$this->sessionKey];
		$html = '';
		
		foreach() {
			$html .= '<div class="message' . $message['type'] . '"><p>' . $message['content'] . '</p></div>';
		}
		
		$this->clearSession();
	
		return $html;
	}
	
	
	/**
	 * Clear the session
	 *
	 * @return void
	 */
	public function clearSession()
	{
		$_SESSION[$this->sessionKey] = null;
	}
 
}