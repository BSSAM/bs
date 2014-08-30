<script>
    var path_url    =   '<?PHP echo Router::url('/',true); ?>';
</script>
<div class="block col-md-12">
                        <div class="block-title">
                            <h2><strong>Uploaded File List</strong></h2>
                        </div>
                       <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">File ID</th>
                                        <th class="text-center">File Type</th>
                                        <th>File Name</th>
                                        <th>File Size</th>
                                        <th>Upload Type</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP if(!empty($salesorder['SalesDocument'])): ?>
                                    <?PHP foreach($salesorder['SalesDocument'] as $document): ?>
                                    <?PHP $file_name    = explode('_',$document['document_name']); 
                                          unset($file_name[0]); 
                                          $document_file_name   =   implode($file_name,'-') ; ?>
                                    <?PHP $extension = pathinfo($document['document_name'], PATHINFO_EXTENSION); ?>
                                    <?PHP switch ($extension){
                                        case 'docx':
                                            $icon   =   'docx.png';
                                            break;
                                        case 'pdf':
                                            $icon   =   'pdf.png';
                                            break;
                                         case 'xslx':
                                            $icon   =   'xslx.png';
                                            break;
                                        default :
                                             $icon   =   'default.jpg';
                                            break;
                                    } ?>
                                    <tr class="document_<?PHP echo $document['id']; ?>">
                                        <td class="text-center"><?PHP echo $document['id']; ?></td>
                                        <td class="text-center">
                                            <?PHP echo $this->Html->image($icon,array('alt'=>'avatar','class'=>'img-circle')); ?>
                                        </td>
                                        <td><?PHP echo $document_file_name; ?></td>
                                        <td><span class="label label-success"><?PHP echo $this->Fileupload->calculateSize($document['document_size']); ?></span></td>
                                        <td><span class="label label-warning"><?PHP echo $document['upload_type']; ?></span></td>
                                        
                                        <td class="text-center">
                                            <div class="btn-group">
                                            <?PHP
						echo $this->Html->link('<i class="gi gi-disk_save"></i>',
                                                array('controller'=>'Salesorders','action'=>'attachment',
						$salesorder['Salesorder']['salesorderno'],$document['document_name']),array('escape'=>false,'class'=>'btn btn-xs btn-default','data-toggle'=>'tooltip','title'=>'Download'));
                                            ?>
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-default sales_document_delete" data-salesorder_id="<?PHP echo $salesorder['Salesorder']['salesorderno']; ?>" data-id="<?PHP echo $document['id']; ?>" data-name="<?PHP echo $document_file_name; ?>" data-org_name="<?PHP echo $document['document_name']; ?>"><i class="gi gi-bin"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?PHP endforeach; ?>
                                    <?PHP endif; ?>
                                </tbody>
                            </table>
                       </div>
</div>
