<?php include_once APPROOT . '../views/inc/header.php'; ?>

<!-- <?php
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
?> -->

<main>
    <div class="container">
        <h1 class="text-uppercase">étape 2</h1>
        <div class="form_diploma">    
            <form action="<?php echo URLROOT; ?>/UserController/diplomas" method="post">
                <h2 class="text-light bg-success p-2">Ajouter un ou plusieurs diplômes</h2>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                                <input type="hidden" name="id_user" id="id_user" value="<?php echo $data->id_user; ?>">
                            <td>
                                <label for="diploma" >Diplôme: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="text" name="name_diploma" id="diploma">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="level" >Niveau: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="text" name="level" id="level">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date_diploma" >Date Diplôme: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="date" name="date_diploma" id="date_diploma">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="etablissement" >Etablissement: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <textarea name="etablissement" id="etablissement" cols="30" rows="5"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="subject" >Sujet: <span class="text-danger">*</span></label>
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