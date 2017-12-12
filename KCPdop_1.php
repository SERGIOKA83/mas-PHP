<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		
		<title>Допзадание</title>
		
		<link rel="stylesheet" href="style1.css" />
		
	</head>
	<body>
		
		<h1>Массивы</h1>
		
		<h2>Задание 1</h2>
		
		
		<?php
			$mega_menu_arr = array(
			                        array("name"=>"Элемент 1", "link"=>"ref1.php", array( 
									                                 array("name"=>"Элемент 4", "link"=>"ref4.php",array(
																	                                  array("name"=>"Элемент 9", "link"=>"ref9.php"  ),
																									  array("name"=>"Элемент 10", "link"=>"ref10.php"  ) 
											                                                        )  
																		  ),
																						
																	 array("name"=>"Элемент 5", "link"=>"ref5.php"  ) 
																	)  
										 ), 
								    array("name"=>"Элемент 2", "link"=>"ref2.php",array( 
									                                 array("name"=>"Элемент 6", "link"=>"ref6.php" ),
																						
																	 array("name"=>"Элемент 7", "link"=>"ref7.php", array(
																	                                  array("name"=>"Элемент 11", "link"=>"ref11.php"  ),
																									  array("name"=>"Элемент 12", "link"=>"ref12.php"  ) 
											                                                          ) 
																		  )						  
																	)  
										 ), 
									array("name"=>"Элемент 3", "link"=>"ref3.php",array( 
									                                array("name"=>"Элемент 8", "link"=>"ref8.php", array(
																	                                  array("name"=>"Элемент 13", "link"=>"ref13.php"  ),
																									  array("name"=>"Элемент 14", "link"=>"ref14.php"  ),
																									  array("name"=>"Элемент 15", "link"=>"ref14.php"  ) 
											                                                         )     
														                 )
																	)	 
										 )
								  );
			
			
			function viewMenu( array $mass_menu ) : void
			{
			   
			   foreach($mass_menu as $mass_submenu){
			 
			    
				echo "<ul>";
				
				foreach($mass_submenu as $key=>$value)
				{
				 
					
					
					if(is_array($value))
					{
					
						viewMenu($value);   //Если $value - массив, то совершаем рекурсивный вызов функции.
					}						//Иначе выводим переменную.
					else  
					{   
				        
					   if($key == "name")
						   $name = $value;
					   
					   if($key == "link")
						   echo "<li><a href=\"$value\">$name</a></li>";
							
					}
					
					
				}
				
				echo "</ul>";
			  }
			
					   
			}
			
			viewMenu( $mega_menu_arr );
		?>
		
	<h2>Задание 2</h2>	
	
	<?php
			$mega_sort_arr = ["A1",["ax",11.37,["z","x","c"],"aaa","bbb"],"A2",[10,20,[36.6,"y",12.5],15],"A22","A3","A0",["eee","aaa",12,25.3],5,1,3];
			                 
			
			function viewLevels( array $mass_levels ) : void
			{
			   
			   
			 
			    
				echo "<ul>";
				
				foreach($mass_levels as $value)
				{
				 
					
					
					if(is_array($value))
					{
					
						viewLevels($value);   //Если $value - массив, то совершаем рекурсивный вызов функции.
					}						//Иначе выводим переменную.
					else  
					{ 
						   echo "<li>$value</li>";
							
					}
					
					
				}
				
				echo "</ul>";
			 
			
					   
			}
			
			
			function massSort( array $mass_levels ) : array
			{
			   
			   
			 
			  
				$size = sizeof($mass_levels);
				
				for($i = $size-1; $i>=0; $i--)
				{
				    for($j=0; $j<$i; $j++)
				    {
					
					
					    if(!is_array($mass_levels[$j]))
					    {
					           
					           $k=$j+1;
							
					         while(($k<$i) and is_array($mass_levels[$k]))
							 {
						        
									
						         $k++;
								
							 }
							 if($k>$i)
					            $j=$k;					 
						     else
							 {
						 
								if($mass_levels[$j] > $mass_levels[$k])
								{ 
							        $temp = $mass_levels[$k];
							        $mass_levels[$k]=$mass_levels[$j];
									$mass_levels[$j]=$temp;
								}
						    }
							
					    }
						else
						{
					        $mass_levels[$j]= massSort( $mass_levels[$j] );
					    }	
					    
					
				    }
					 
				}
				
				
			 
			
				return 	$mass_levels;   
			}
			
			function delElement( array $mass_levels ) : array
			{
			   
			   
			 
			    
		
				
				foreach($mass_levels as $key => $value)
				{
				 
					
					
					if(is_array($value))
					
					
						$mass_levels[$key] = delElement($value);   
						
					else  
					{ 
				
				         
				
						   if (is_double($value) or is_string($value)) 
						   { 
						   
							   unset($mass_levels[$key]); //Удаляем нецелочисленные элементы
							   
						   }
							
					}
					
					
				}
				
				
			 
			    return $mass_levels;
					   
			}
			
			
			
			echo "</br>Исходный вид</br>";
			
			viewLevels( $mega_sort_arr );
		   
			echo "</br>После сортировки</br>";
			  
			$mass=massSort( $mega_sort_arr);
			  
			viewLevels($mass);
			
			echo "</br>После удаления нецелочисленных элементов</br>";
					
			viewLevels(delElement( $mass ));
		?>
		
		
	</body>
</html>		

								