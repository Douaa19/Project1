<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container">
        <h1 class="text-light p-2" style="background-color: #2273B9;">Experiences</h1>
        <div class="container row">
                <form action="<?php echo URLROOT; ?>/UserController/addExperience" method="post">
                    <table class="table table-striped">
                        <tbody>
                            <?php if(!empty($data['error_message'])){ ?><h6 class="text-danger"><?php echo '*' . $data['error_message'] . '*';} ?></h6>
                            <tr>
                                <td>
                                    <label for="start_date" <?php if(!empty($data['error_start_date'])) : ?> class="text-danger" <?php endif; ?>>Date début:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <input type="date" name="start_date" id="start_date">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="end_date" <?php if(!empty($data['error_start_date'])) : ?> class="text-danger" <?php endif; ?>>Date fin:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <input type="date" name="end_date" id="end_date">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="company" <?php if(!empty($data['error_company'])) : ?> class="text-danger" <?php endif; ?>>Société:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <input type="text" name="company" id="company">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="type_contract" <?php if(!empty($data['error_type_contract'])) : ?> class="text-danger" <?php endif; ?>>Type de contrat:</label>
                                </td>
                                <td>
                                    <select name="type_contract" id="type_contract">

                                        <option value="null">- Sélectionner -</option>
                                        <option value="cdd">CDD</option>
                                        <option value="cdi">CDI</option>
                                        <option value="intérim">Intérim</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="function" <?php if(!empty($data['error_function'])) : ?> class="text-danger" <?php endif; ?>>Fonction:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <textarea name="function" id="function" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="area" <?php if(!empty($data['error_area'])) : ?> class="text-danger" <?php endif; ?>>Secteur:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <textarea name="area" id="area" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="details" <?php if(!empty($data['error_details'])) : ?> class="text-danger" <?php endif; ?>>Details:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <textarea name="details" id="details" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-success text-light">Ajouter</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                
                <div class="table mb-5 mt-3">
                    <table class="table">
                        <thead>
                            <tr>
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
                                <?php if(!empty($experience->id_experience)) { ?>
                            <tr>
                                <td><?php echo $experience->start_date; ?></td>
                                <td><?php echo $experience->end_date; ?></td>
                                <td><?php echo $experience->company; ?></td>
                                <td><?php echo $experience->type_contract; ?></td>
                                <td><?php echo $experience->function; ?></td>
                                <td>
                                    <form action="<?= URLROOT ?>/UsersController/deleteExperience" method="post">
                                        <input type="hidden" name="id_user" value="<?php echo $experience->id_user; ?>">
                                        <input type="hidden" name="id_experience" value="<?php echo $experience->id_experience; ?>">
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            <?php }else { ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary"><a class="text-light text-decoration-none" href="<?= URLROOT ?>/UsersController/languagesPage">Suivant</a></button>
                </div>
        </div>
    </div>
</main>

</body>
</html>