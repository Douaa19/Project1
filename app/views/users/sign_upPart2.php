<!-- <?php
    echo '<pre>';
    var_dump($data);
    echo '</pre>'; ?> -->
    

<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container">
        <h1 class="text-uppercase">étape 2</h1>
        <div class="form_diploma">    
            <form action="<?php echo URLROOT; ?>/UserController/diplomas" method="post">
                <h2 class="text-light bg-success p-2">Ajouter un ou plusieurs   diplômes</h2>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                <label for="diploma" <?php if(empty($data['name_diploma'])) : ?> class="text-danger" <?php endif; ?>>Diplôme: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="text" name="name_diploma" id="diploma">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="level" <?php if(empty($data['level'])) : ?> class="text-danger" <?php endif; ?>>Niveau: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="text" name="level" id="level">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date_diploma" <?php if(empty($data['date_diploma'])) : ?> class="text-danger" <?php endif; ?>>Date Diplôme: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="date" name="date_diploma"  id="date_diploma">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="etablissement" <?php if(empty($data['etablissement'])) : ?> class="text-danger" <?php endif; ?>>Etablissement: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <textarea name="etablissement" id="etablissement" cols="30" rows="5"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="subject" <?php if(empty($data['subject'])) : ?> class="text-danger" <?php endif; ?>>Sujet: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <textarea name="subject" id="subject" cols="30" rows="5"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success text-light">Ajouter</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</main>