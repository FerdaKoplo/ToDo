<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Issue> $issues
 * @property-read int|null $issues_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $status_id
 * @property int|null $priority_id
 * @property int $department_id
 * @property string $title
 * @property string|null $reference_url
 * @property \Illuminate\Support\Carbon $issue_date
 * @property string|null $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IssueTag> $issueTag
 * @property-read int|null $issue_tag_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereReferenceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Issue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Issue extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $issue_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereIssueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IssueTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IssueTag extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $scheduled_at
 * @property string $timezone
 * @property int $issue_id
 * @property string|null $frequency
 * @property int $interval
 * @property int $is_recurring
 * @property string $recurrence_end_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Issue $issue
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereIsRecurring($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereIssueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereRecurrenceEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Schedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Schedule extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $tag_name
 * @property string|null $color
 * @property string|null $icon
 * @property string $tag_types
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IssueTag> $issueTag
 * @property-read int|null $issue_tag_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereTagName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereTagTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tags whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Tags extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\OneTimePasswords\Models\OneTimePassword> $oneTimePasswords
 * @property-read int|null $one_time_passwords_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

