<div id="sidebar">
					<ul>
                                            <li><h2>Knowledge  Centre</h2></li>
                                            <li class="pagenav"><ul>
                                                <?php /* wp_list_pages('child_of=26&sort_column=post_title&title_li=') */ ?>
                                                </ul>
                                                <?php wp_nav_menu( array( 'menu' => 'knowledge-sidemenu') );  ?>
                                                </li>
						<li class="widget-container" id="searchwidget">
							<form action="#" method="post">
								<div><input type="text" size="32" /><input type="submit" value="Search" class="button2"/></div>
							</form>
						</li>

					</ul>
					</div>