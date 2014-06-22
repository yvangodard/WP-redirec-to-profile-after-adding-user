<?php
/*
  Plugin Name:  Rediriger vers la page d'édition d'un profil après l'ajout d'un membre
  Description:  Cette astuce permet d'être rediriger vers la page d'édition d'un utilisateur après l'avoir ajouté à partir de l'administration de WordPress.
  Plugin URI:   http://goo.gl/TpXl0G
  Version:      1.0
  Author:       Jonathan Buttigieg
  Author URI:   http://www.jbuttigieg.net/
 
  /*
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
 
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
 
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

add_action( 'admin_init', 'gkp_redirect_user_add' );
function gkp_redirect_user_add() {
  
    global $pagenow;
  
    if( $pagenow=='users.php' && isset( $_GET['usersearch'], $_GET['update'] ) && $_GET['update']=='add' ) {
    
  $username = $_GET['usersearch'];
  $user = get_user_by('login', $username);
    
   if( isset( $user->ID ) )
       wp_redirect( admin_url( 'user-edit.php?user_id=' . $user->ID ) );
    }
}