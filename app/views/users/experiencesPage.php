<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container">
    <h1 class="text-light p-2" style="background-color: #2273B9;">Diplômes</h1>
        <div class="container row">
            <div class="experience">
                <form action="<?php echo URLROOT; ?>/UserController/addExperience" method="post">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <label for="start_date">Date début:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <input type="date" name="start_date" id="start_date">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="end_date">Date fin:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <input type="date" name="end_date" id="end_date">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="company">Société:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <input type="text" name="company" id="company">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="type_contract">Type de contrat:</label>
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
                                    <label for="function">Fonction:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <textarea name="function" id="function" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="area">Secteur:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <textarea name="area" id="area" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="details">Details:<span class="text-danger"> *</span></label>
                                </td>
                                <td>
                                    <textarea name="details" id="details" cols="80" rows="5" class="control show-character-counter" maxlength="140"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <input type="text" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
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
</main>

</body>
</html>