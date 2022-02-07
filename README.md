# ClickUp-Task-Get-Custom-Fields
A bit of functionality to get custom fields of a ClickUp Task.  I created this for my own use. I may be open to collaboration and/or questions depending on how busy I am.

## Requirements
1. SSL must be enabled for site where this code lives
2. ClickUp "access_token"
3. ClickUp "task_id"

## Notes
1. Does not seem to return formula fields
2. Task ID can be copied directly from the ClickUp task 3 dots sub-menu (How I tested it)

## Setup Instructions
1. Place this folder or code where you want to access on the web i.e. "[your-domain.com]/clickup"
2. In ClickUp: Go to space "Settings"->"Integrations"->"ClickUp API"
3. Click "+ Create an App", then Give it a name and use the naked domain of where this code will live as the "Redirect URL(s)", then click "Create App"
4. Open (in a new tab) the "API Documentation" link above the app you just created
5. Open another new tab, paste the following, then replace "{client_id}" and {redirect_uri} with your corresponding app details: https://app.clickup.com/api?client_id={client_id}&redirect_uri={redirect_uri} then hit enter
6. In the window click the space with the custom fields you are trying to access, then click the confirmation button at the bottom
7. This will redirect you to the "{redirect_uri} along with a paremeter code, copy the "code" value
8. In the Clickup API, go to "Reference" -> "Authorization", then click "Get Access Token"
9. In the example window to the right, click the "Switch to Console" button in the upper-right
10. in the "URI Parameters" tab, replace the "null"s with your corresponding values, then scroll down to the bottom of the response and this is your "access_token"
11. record your access token for use later in the Zapier Webhook Set up action Step details


## Zapier Webhook Set up action Step details

Just change the following in the "Set up action" step and leave the rest as their default values.

> **URL**: [your-domain.com]/clickup/fields/ (or wherever you put the code)
> 
> **Query String Params**: 
> - access_token : [your access token]
> - task_id : [the_task id]
