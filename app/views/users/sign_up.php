<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container">
        <form action="" method="post" class="">
            <table class="table">
                <tbody>
                  <tr>
                    <td class="row">
                    <label for="sexe">civilité:</label>
                    </td>
                    <td>
                        <select name="sexe" id="sexe">
                          <option value="null">- Sélectionner -</option>
                          <option value="mr">M</option>
                          <option value="mrs">Mmme</option>
                          <option value="ms">Mlle</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="">nom:</label>
                    </td>
                    <td>
                        <input type="text" class="" name="lName">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="">prénom:</label>
                    </td>
                    <td colspan="fName">
                        <input type="text" class="" name="fName">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="activity">secteur d'activité</label>
                    </td>
                    <td>
                        <select name="activity" id="activity">
                          <option value="null">- Sélectionner -</option>
                          <option value="mr">Activités associatives </option>
                          <option value="mrs">2</option>
                          <option value="ms">3</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="date_naissance">date de naissance:</label>
                    </td>
                    <td>
                        <input type="date" class="control text" name="date_naissance" id="date_naissance">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="email">email:</label>
                    </td>
                    <td>
                        <input type="text" class="control text" name="email" id="email" maxlength="12">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="emphoneail">téléphonne portable:</label>
                    </td>
                    <td>
                        <input type="text" class="control text" name="phone" id="phone">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="cp">code postal:</label>
                    </td>
                    <td>
                        <input type="text" class="control text" name="cp" id="cp">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="cp">adresse:</label>
                    </td>
                    <td>
                        <textarea name="adresse" id="adresse" cols="80" rows="5" class="control show-character-counter" maxlength="140" ></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="pays">pays:</label>
                    </td>
                    <td>
                        <select name="pays" id="pays">
                          <option value="null">- Sélectionner -</option>
                          <option value="maroc">Maroc</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="ville">ville:</label>
                    </td>
                    <td>
                        <select name="ville" id="ville">
                          <option value="null">- Sélectionner -</option>
                          <option value="youssoufia">Youssoufia</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="cv">CV:</label>
                    </td>
                    <td>
                        <input type="file" name="cv" id="cv" accept=".doc,.docx,.pdf,application/msword,application/vnd.ms-office,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/zip,application/msword,application/x-zip,application/pdf,application/force-download,application/x-download,binary/octet-stream">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <div class="submit">
                            <button type="submit" class="btn btn-seccesse">envoyer</button>
                        </div>
                    </td>
                    <td>
                    <span>Vous avez un compte <a href="<?php echo URLROOT; ?>/UsersController/index">Connecter vous!</a></span>
                    </td>
                  </tr>
                </tbody>
            </table>
        </form>
    </div>
</main>