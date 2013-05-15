<?php
/**
 *  
 *  Copyright (C) 2012 paj@gaiterjones.com
 *
 *	This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  @category   PAJ
 *  @package    
 *  @license    http://www.gnu.org/licenses/ GNU General Public License
 * 	
 *
 */

 
class PostToUsersFacebookWall extends ConnectToFacebook{
	
	public function __construct($_fbAppID,$_fbAppSecret) {
		
		parent::__construct($_fbAppID,$_fbAppSecret);
		
		try
		{
			$_obj = $this->__facebook->api('/me/feed', 'POST',
				array(
				  'link' => $this->__config->get('fbURL'),
				  'picture' => $this->__config->get('appURL'). 'images/'. $this->__config->get('appIcon'),
				  'message' => $this->__config->get('wallPostMessage'),
				  'caption' => $this->__config->get('wallPostCaption'),
				  'name' => $this->__config->get('appName')
			 ));
			 

			
		} catch (FacebookApiException $e) {
			// try to go wrong quietly...
			$_obj  = null;
			
		}		
		
	}


}