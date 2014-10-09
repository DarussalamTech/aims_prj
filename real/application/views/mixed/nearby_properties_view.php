<?php 
$nearby_count = count($nearby_properties);

if(!empty($nearby_count)){ ?>
    <table>
      <tr>
        <?php 
            $r=1;
            foreach ($nearby_properties as $nearyby_details) {
                $last_class = '';
                $address = '';
    
            if(!empty($nearyby_details["49"])){
                 $address .= $nearyby_details["49"].', ';
            }	
            $address .= $nearyby_details["2302"].', '.$nearyby_details["2304"].' '.$nearyby_details["46"];
    
        ?>
        <td><div class="searchResult"> <a class="propPhotoWrapper" title="View Full Property Details For <?php echo $address; ?>" href="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/real-estate/property-details/'.$nearyby_details["175"]; ?>">
            <?php show_property_image($nearyby_details["sysid"],'style="width:195px;height:165px;"'); ?>
            </a>
            <div class="propDetails">
              <h3> <a title="View Full Property Details For  <?php echo $address; ?>" href="<?php echo "http://" . $_SERVER['HTTP_HOST'].'/real-estate/property-details/'.$nearyby_details["175"]; ?>">
                <?php 
                     if(!empty($nearyby_details["49"])){
                        echo $nearyby_details["49"].', ';
                    }
                    echo $nearyby_details["2302"].', '.$nearyby_details["2304"].' '.$nearyby_details["46"];
                 ?>
                </a> </h3>
              <p class="priceBlock"> <span class="price">
                <?php 
                    if(!empty($nearyby_details["176"])){
                        echo '$' . number_format($nearyby_details["176"], 0, ".", ","); 
                    }else{
                        echo 'Price: Contact realtor';
                    }
                    
                ?>
                </span> </p>
              <?php if((!empty($nearyby_details["32"])) || (!empty($nearyby_details["2294"])) || (!empty($nearyby_details["2346"])) ){ ?>
              <p>
                <?php 
                    if(!empty($nearyby_details["32"])){
                        echo $nearyby_details["32"].' Bed | '; 
                    }
                    if(!empty($nearyby_details["2294"])){
                        echo $nearyby_details["2294"].' Bath | '; 
                    }
                    if(!empty($nearyby_details["2346"])){
                        echo number_format($nearyby_details["2346"], 0, ".", ",").' Sq Ft'; 
                    }
                ?>
              </p>
              <?php } ?>
              <p class="distance">
                <?php 
                    if(!empty($nearyby_details["distance"])){
                        echo round($nearyby_details["distance"],2).' Miles Away'; 
                    }
                ?>
              </p>
              <p class="listingInfo">
                <?php 
                    if(!empty($nearyby_details["2368"])){
                        echo 'Listing by '.$nearyby_details["2368"]; 
                    }
                ?>
              </p>
            </div>
          </div></td>
        <?php
                    if($r % 3 == 0){
                       echo '</tr><tr>';
                    }
                   $r++;
                }
                
                ?>
    </table>
<?php 
	}else{
		echo 'No properties found.';
	}
?>