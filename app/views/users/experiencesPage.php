<?php include_once APPROOT . '../views/inc/headerSignUp.php'; ?>

<main>
<div class="container row p-0" id="container">
    <div class="vid col-2 p-0"></div>
    <div class="content col-10 p-0">
        <h2 class="h2" id="h2">Ajoutez un ou plusieurs diplômes experiences</h2>
            <div class="form">
                <form action="<?php echo URLROOT; ?>/UserController/addExperience" method="post" id="form">
                    <table class="table" id="table">
                        <tbody>
                            
                            <tr>
                                <?php if(!empty($data['error_message'])){ ?><h6 class="text-danger"><?php echo '*' . $data['error_message'] . '*';} ?></h6>
                            </tr>

                            <tr class="light">
                                <td class="row">
                                    <label for="start_date" <?php if(!empty($data['error_start_date'])) : ?> class="text-danger" <?php endif; ?>>Date début:<span class="text-danger"> *</span></label>
                                </td>
                                <td class="input">
                                    <input type="date" name="start_date" id="start_date">
                                </td>
                            </tr>
                            <tr class="dark">
                                <td class="row">
                                    <label for="end_date" <?php if(!empty($data['error_start_date'])) : ?> class="text-danger" <?php endif; ?>>Date fin:<span class="text-danger"> *</span></label>
                                </td>
                                <td class="input">
                                    <input type="date" name="end_date" id="end_date">
                                </td>
                            </tr>
                            <tr class="light">
                                <td class="row">
                                    <label for="company" <?php if(!empty($data['error_company'])) : ?> class="text-danger" <?php endif; ?>>Société:<span class="text-danger"> *</span></label>
                                </td>
                                <td class="input">
                                    <input type="text" name="company" id="company">
                                </td>
                            </tr>
                            <tr class="dark">
                                <td class="row">
                                    <label for="type_contract" <?php if(!empty($data['error_type_contract'])) : ?> class="text-danger" <?php endif; ?>>Type de contrat:</label>
                                </td>
                                <td class="input">
                                    <select name="type_contract" id="type_contract">

                                        <option value="null">- Sélectionner -</option>
                                        <option value="cdd">CDD</option>
                                        <option value="cdi">CDI</option>
                                        <option value="intérim">Intérim</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="light">
                                <td class="row">
                                    <label for="function" <?php if(!empty($data['error_function'])) : ?> class="text-danger" <?php endif; ?>>Fonction:<span class="text-danger"> *</span></label>
                                </td>
                                <td class="input">
                                    <textarea name="function" id="function" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                            <tr class="dark">
                                <td class="row">
                                    <label for="area" <?php if(!empty($data['error_area'])) : ?> class="text-danger" <?php endif; ?>>Secteur:<span class="text-danger"> *</span></label>
                                </td>
                                <td class="input">
                                    <textarea name="area" id="area" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                            <tr class="light">
                                <td class="row">
                                    <label for="details" <?php if(!empty($data['error_details'])) : ?> class="text-danger" <?php endif; ?>>Details:<span class="text-danger"> *</span></label>
                                </td>
                                <td class="input">
                                    <textarea name="details" id="details" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                                <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                            <tr class="dark">
                                <td></td>
                                <td class="button">
                                    <div class="submit">
                                        <button type="ajouter" class="btn" id="btn">Ajouter<button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php if(!empty($data1)) : ?>
                <div class="experiences">
                    <table class="table">
                        <thead>
                            <tr class="tr" id="tr">
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Société</th>
                                <th>Contrat</th>
                                <th>Fonction</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $experience) : ?>
                            <tr>
                                <td><?php echo $experience->start_date; ?></td>
                                <td><?php echo $experience->end_date; ?></td>
                                <td><?php echo $experience->company; ?></td>
                                <td><?php echo $experience->type_contract; ?></td>
                                <td><?php echo $experience->function; ?></td>
                                <td class="user">
                                    <form action="<?= URLROOT ?>/UsersController/deleteExperience" method="post">
                                        <input type="hidden" name="id_user" value="<?php echo $experience->id_user; ?>">
                                        <input type="hidden" name="id_experience" value="<?php echo $experience->id_experience; ?>">
                                        <button type="submit" class="btn" id="submit-delete">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="submit">
                        <button type="submit" class="btn" id="btn"><a class="text-light text-decoration-none" href="<?= URLROOT ?>/UsersController/languagesPage">Suivant</a>
                        </button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
    </div>
</div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>

</body>
</html>