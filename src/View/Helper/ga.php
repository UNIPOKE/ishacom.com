<?php

// Load the Google API PHP Client Library.
require_once '/home/vagrant/ishacom.com/vendor/autoload.php';

function initializeAnalytics()
{
  // Creates and returns the Analytics Reporting service object.

  // Use the developers console and download your service account
  // credentials in JSON format. Place them in this directory or
  // change the key file location if necessary.
  $KEY_FILE_LOCATION = '/home/vagrant/ishacom.com/ishacom-b0910a8c2487.json';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("Hello Analytics Reporting");
  $client->setAuthConfig($KEY_FILE_LOCATION);
  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
  $analytics = new Google_Service_Analytics($client);

  return $analytics;
}

function getFirstProfileId($analytics) {
  // Get the user's first view (profile) ID.

  // Get the list of accounts for the authorized user.
  $accounts = $analytics->management_accounts->listManagementAccounts();

  if (count($accounts->getItems()) > 0) {
    $items = $accounts->getItems();
    $firstAccountId = $items[0]->getId();

    // Get the list of properties for the authorized user.
    $properties = $analytics->management_webproperties
        ->listManagementWebproperties($firstAccountId);

    if (count($properties->getItems()) > 0) {
      $items = $properties->getItems();
      $firstPropertyId = $items[0]->getId();

      // Get the list of views (profiles) for the authorized user.
      $profiles = $analytics->management_profiles
          ->listManagementProfiles($firstAccountId, $firstPropertyId);

      if (count($profiles->getItems()) > 0) {
        $items = $profiles->getItems();

        // Return the first view (profile) ID.
        return $items[0]->getId();

      } else {
        throw new Exception('No views (profiles) found for this user.');
      }
    } else {
      throw new Exception('No properties found for this user.');
    }
  } else {
    throw new Exception('No accounts found for this user.');
  }
}

function getMonthlyRanking($analytics, $profileId) {
  $results = $analytics->data_ga->get(
    'ga:' . $profileId,
    '30daysAgo',
    'today',
    'ga:Pageviews',
    array(
      'dimensions'  => 'ga:pagePath', // 副指標
      'sort'        => '-ga:Pageviews', // - を付けると降順ソート
      'max-results' => 50, // 取得件数
    )
  );

  // 取得したデータから必要な部分を抽出
  $data = $results->rows;

  // 配列で取得したデータをループで回してランキングに
  $ranking = array();
  foreach ($data as $key => $row) {
    $ranking[] = array('url'=>$row[0], 'pv'=>$row[1]);
  }
  return $ranking;
}
