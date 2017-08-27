<table class="table service-list">
        <thead>
                <tr>
			<th>Process</th>
                        <th>Service name</th>
                        <th>Status</th>
                </tr>
        </thead>
        <tbody>
                <?php foreach($processes as $process => $logo):  ?>
                        <tr>
				<td>
					<img style="height: 100px; width: auto;" src="/images/servicelogos/<?php echo $logo ?>" />
				</td>
                                <td>
                                        <?php echo $process; ?>
                                </td>
                                <td style="font-size: 50px;">
                                        <?php if(check_process($process)): ?>
                                                <span style="color: #00af00;" class="glyphicon glyphicon-ok"> </span>
                                        <?php else: ?>
                                                 <span style="color: red;" class="glyphicon glyphicon-remove"> </span>
                                        <?php endif; ?>
                                </td>
                        </tr>
                <?php endforeach; ?>
        </tbody>
</table>
