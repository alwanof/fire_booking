<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  axios.post(
          "https://fcm.googleapis.com/fcm/send",
          {
            to: "ef1jFZERQaK4ozAk1TRtBg:APA91bGuXg4RH56jmgPeZmQGR_7juJSNIDw5U7j7YnLJUtUbpLg5Mi2PbLY3V6OqPJeOdm89t7GYyXMzq6qAao5wvfv5PZm8VRtYtRIPncxi51Nmo--izNh-WRbU5pjt0ixC6iGFrQa9",
            notification: {
              title: "New notification from web",
              body: "hammode needs a taxi",
            },
          },
          {
            headers: {
              "Content-Type": "application/json",
              Authorization:
                "key=AAAAL7epsrw:APA91bGgOmwkI-dPOJAI86XP9_LtipbeeshHEgkdGK_r7gLQEupcza9ApKgr1T97mEBwn8psdaNmgXRi4UtxAGju15rVBwlB3wcXRXWBbLglwtcJeeHrFwgO_arXK4-KTPszqjCYZKfM",
            },
          }
        )
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
</script>
