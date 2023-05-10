<?php
<tr>
												<td><?php echo $gig->gigID; ?></td>
												<td><?php echo $gig->developerID?></td>
												<td><?php echo $gig->publisherID ?></td>
												<td><?php echo $gig->sharePercentage ?></td>
												<td><?php echo $gig['publisherIncome']; ?></td>
												<td><?php echo $gig['purchasedDate']; ?></td>
												<!-- <td><?php echo date('M d, Y', strtotime($gig['purchasedDate'])); ?></td> -->
												<td>$<?php echo $gig['publisherCost']; ?></td>
												</tr>