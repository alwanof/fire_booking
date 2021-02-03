<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */
/** @noinspection PhpUnusedAliasInspection */

namespace App {

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\MorphTo;
    use Illuminate\Database\Eloquent\Relations\MorphToMany;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Collection;
    use LaravelIdea\Helper\App\_BookingCollection;
    use LaravelIdea\Helper\App\_BookingQueryBuilder;
    use LaravelIdea\Helper\App\_CategoryCollection;
    use LaravelIdea\Helper\App\_CategoryImageCollection;
    use LaravelIdea\Helper\App\_CategoryImageQueryBuilder;
    use LaravelIdea\Helper\App\_CategoryQueryBuilder;
    use LaravelIdea\Helper\App\_ConfigurationCollection;
    use LaravelIdea\Helper\App\_ConfigurationQueryBuilder;
    use LaravelIdea\Helper\App\_CustomerCollection;
    use LaravelIdea\Helper\App\_CustomerQueryBuilder;
    use LaravelIdea\Helper\App\_LanguageCollection;
    use LaravelIdea\Helper\App\_LanguageQueryBuilder;
    use LaravelIdea\Helper\App\_RoleConfigurationCollection;
    use LaravelIdea\Helper\App\_RoleConfigurationQueryBuilder;
    use LaravelIdea\Helper\App\_ServiceCollection;
    use LaravelIdea\Helper\App\_ServiceImageCollection;
    use LaravelIdea\Helper\App\_ServiceImageQueryBuilder;
    use LaravelIdea\Helper\App\_ServiceQueryBuilder;
    use LaravelIdea\Helper\App\_ServiceTimeCollection;
    use LaravelIdea\Helper\App\_ServiceTimeQueryBuilder;
    use LaravelIdea\Helper\App\_SettingCollection;
    use LaravelIdea\Helper\App\_SettingQueryBuilder;
    use LaravelIdea\Helper\App\_UserCollection;
    use LaravelIdea\Helper\App\_UserModelCollection;
    use LaravelIdea\Helper\App\_UserModelImageCollection;
    use LaravelIdea\Helper\App\_UserModelImageQueryBuilder;
    use LaravelIdea\Helper\App\_UserModelQueryBuilder;
    use LaravelIdea\Helper\App\_UserQueryBuilder;
    use LaravelIdea\Helper\Illuminate\Notifications\_DatabaseNotificationCollection;
    use LaravelIdea\Helper\Illuminate\Notifications\_DatabaseNotificationQueryBuilder;
    use LaravelIdea\Helper\Spatie\Permission\Models\_PermissionCollection;
    use LaravelIdea\Helper\Spatie\Permission\Models\_PermissionQueryBuilder;
    use LaravelIdea\Helper\Spatie\Permission\Models\_RoleCollection;
    use LaravelIdea\Helper\Spatie\Permission\Models\_RoleQueryBuilder;
    use Spatie\Permission\Contracts\Permission as Permission1;
    use Spatie\Permission\Contracts\Role as Role1;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;
    use Spatie\SchemalessAttributes\SchemalessAttributes;

    /**
     * @property int $id
     * @property string $bookable_type
     * @property int|integer $bookable_id
     * @property string $customer_type
     * @property int|integer $customer_id
     * @property int|integer $user_id
     * @property Carbon|null $starts_at
     * @property Carbon|null $ends_at
     * @property Carbon|null $canceled_at
     * @property string|null $timezone
     * @property float $price
     * @property int|integer $quantity
     * @property float $total_paid
     * @property string $currency
     * @property string|null|mixed $formula
     * @property string|null|array $options
     * @property string|null $notes
     * @property string $booking_key
     * @property int $status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property-read SchemalessAttributes $options
     * @property Model $bookable
     * @method MorphTo bookable()
     * @property Model $customer
     * @method MorphTo customer()
     * @method _BookingQueryBuilder newModelQuery()
     * @method _BookingQueryBuilder newQuery()
     * @method static _BookingQueryBuilder query()
     * @method static _BookingCollection|Booking[] all()
     * @method _BookingQueryBuilder cancelled()
     * @method _BookingQueryBuilder cancelledAfter(string $date)
     * @method _BookingQueryBuilder cancelledBefore(string $date)
     * @method _BookingQueryBuilder cancelledBetween(string $startsAt, string $endsAt)
     * @method _BookingQueryBuilder current()
     * @method _BookingQueryBuilder endsAfter(string $date)
     * @method _BookingQueryBuilder endsBefore(string $date)
     * @method _BookingQueryBuilder endsBetween(string $startsAt, string $endsAt)
     * @method _BookingQueryBuilder future()
     * @method _BookingQueryBuilder ofBookable(Model $bookable)
     * @method _BookingQueryBuilder ofCustomer(Model $customer)
     * @method _BookingQueryBuilder past()
     * @method _BookingQueryBuilder range(string $startsAt, string $endsAt)
     * @method _BookingQueryBuilder startsAfter(string $date)
     * @method _BookingQueryBuilder startsBefore(string $date)
     * @method _BookingQueryBuilder startsBetween(string $startsAt, string $endsAt)
     * @method _BookingQueryBuilder withOptions()
     * @mixin _BookingQueryBuilder
     */
    class Booking extends Model
    {
    }

    /**
     * @property int $id
     * @property int $user_id
     * @property string $title
     * @property string $avatar
     * @property string|null $video
     * @property string $description
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _CategoryImageCollection|CategoryImage[] $Images
     * @method HasMany|_CategoryImageQueryBuilder Images()
     * @property _UserModelCollection|UserModel[] $Models
     * @method HasMany|_UserModelQueryBuilder Models()
     * @method _CategoryQueryBuilder newModelQuery()
     * @method _CategoryQueryBuilder newQuery()
     * @method static _CategoryQueryBuilder query()
     * @method static _CategoryCollection|Category[] all()
     * @mixin _CategoryQueryBuilder
     */
    class Category extends Model
    {
    }

    /**
     * @property int $id
     * @property int $category_id
     * @property string $path
     * @property Carbon $created_at
     * @property Carbon $updated_at
     * @property Category $Category
     * @method BelongsTo|_CategoryQueryBuilder Category()
     * @method _CategoryImageQueryBuilder newModelQuery()
     * @method _CategoryImageQueryBuilder newQuery()
     * @method static _CategoryImageQueryBuilder query()
     * @method static _CategoryImageCollection|CategoryImage[] all()
     * @mixin _CategoryImageQueryBuilder
     */
    class CategoryImage extends Model
    {
    }

    /**
     * @property int $id
     * @property string $key
     * @property string $value
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _RoleCollection|Role[] $Roles
     * @method BelongsToMany|_RoleQueryBuilder Roles()
     * @method _ConfigurationQueryBuilder newModelQuery()
     * @method _ConfigurationQueryBuilder newQuery()
     * @method static _ConfigurationQueryBuilder query()
     * @method static _ConfigurationCollection|Configuration[] all()
     * @mixin _ConfigurationQueryBuilder
     */
    class Configuration extends Model
    {
    }

    /**
     * @property int $id
     * @property string $name
     * @property int $user_id
     * @property string $email
     * @property Carbon|null $email_verified_at
     * @property string $avatar
     * @property bool $is_deleted
     * @property string|null $remember_token
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method _CustomerQueryBuilder newModelQuery()
     * @method _CustomerQueryBuilder newQuery()
     * @method static _CustomerQueryBuilder query()
     * @method static _CustomerCollection|Customer[] all()
     * @mixin _CustomerQueryBuilder
     */
    class Customer extends Model
    {
    }

    /**
     * @property int $id
     * @property string $name
     * @property bool $rtl_support
     * @property string $locale
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method _LanguageQueryBuilder newModelQuery()
     * @method _LanguageQueryBuilder newQuery()
     * @method static _LanguageQueryBuilder query()
     * @method static _LanguageCollection|Language[] all()
     * @mixin _LanguageQueryBuilder
     */
    class Language extends Model
    {
    }

    /**
     * @property int $id
     * @property int $role_id
     * @property int $configuration_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Configuration $Configuration
     * @method BelongsTo|_ConfigurationQueryBuilder Configuration()
     * @method _RoleConfigurationQueryBuilder newModelQuery()
     * @method _RoleConfigurationQueryBuilder newQuery()
     * @method static _RoleConfigurationQueryBuilder query()
     * @method static _RoleConfigurationCollection|RoleConfiguration[] all()
     * @mixin _RoleConfigurationQueryBuilder
     */
    class RoleConfiguration extends Model
    {
    }

    /**
     * @property int $id
     * @property int $user_id
     * @property int $user_model_id
     * @property string $avatar
     * @property string $title
     * @property string $description
     * @property int $price
     * @property int $discount_price
     * @property string $unit
     * @property int $amount
     * @property int $duration
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _ServiceImageCollection|ServiceImage[] $Images
     * @method HasMany|_ServiceImageQueryBuilder Images()
     * @property UserModel $UserModel
     * @method BelongsTo|_UserModelQueryBuilder UserModel()
     * @property _ServiceTimeCollection|ServiceTime[] $serviceTimes
     * @method HasMany|_ServiceTimeQueryBuilder serviceTimes()
     * @method _ServiceQueryBuilder newModelQuery()
     * @method _ServiceQueryBuilder newQuery()
     * @method static _ServiceQueryBuilder query()
     * @method static _ServiceCollection|Service[] all()
     * @mixin _ServiceQueryBuilder
     */
    class Service extends Model
    {
    }

    /**
     * @property int $id
     * @property int $service_id
     * @property string $path
     * @property Carbon $created_at
     * @property Carbon $updated_at
     * @property Service $Service
     * @method BelongsTo|_ServiceQueryBuilder Service()
     * @method _ServiceImageQueryBuilder newModelQuery()
     * @method _ServiceImageQueryBuilder newQuery()
     * @method static _ServiceImageQueryBuilder query()
     * @method static _ServiceImageCollection|ServiceImage[] all()
     * @mixin _ServiceImageQueryBuilder
     */
    class ServiceImage extends Model
    {
    }

    /**
     * @property int $id
     * @property int $service_id
     * @property string $date
     * @property string $time
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Service $Service
     * @method BelongsTo|_ServiceQueryBuilder Service()
     * @method _ServiceTimeQueryBuilder newModelQuery()
     * @method _ServiceTimeQueryBuilder newQuery()
     * @method static _ServiceTimeQueryBuilder query()
     * @method static _ServiceTimeCollection|ServiceTime[] all()
     * @mixin _ServiceTimeQueryBuilder
     */
    class ServiceTime extends Model
    {
    }

    /**
     * @property int $id
     * @property int $configuration_id
     * @property string $value
     * @property int $user_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Configuration $Configuration
     * @method BelongsTo|_ConfigurationQueryBuilder Configuration()
     * @property User $user
     * @method BelongsTo|_UserQueryBuilder user()
     * @method _SettingQueryBuilder newModelQuery()
     * @method _SettingQueryBuilder newQuery()
     * @method static _SettingQueryBuilder query()
     * @method static _SettingCollection|Setting[] all()
     * @mixin _SettingQueryBuilder
     */
    class Setting extends Model
    {
    }

    /**
     * @property int $id
     * @property string $name
     * @property string $username
     * @property string $email
     * @property Carbon|null $email_verified_at
     * @property string $password
     * @property string $avatar
     * @property bool $is_deleted
     * @property int $level
     * @property int $ref
     * @property string|null $remember_token
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _BookingCollection|Booking[] $Bookings
     * @method HasMany|_BookingQueryBuilder Bookings()
     * @property _CategoryCollection|Category[] $Categories
     * @method HasMany|_CategoryQueryBuilder Categories()
     * @property _UserModelCollection|UserModel[] $UserModels
     * @method HasMany|_UserModelQueryBuilder UserModels()
     * @property _DatabaseNotificationCollection|DatabaseNotification[] $notifications
     * @method MorphToMany|_DatabaseNotificationQueryBuilder notifications()
     * @property _PermissionCollection|Permission[] $permissions
     * @method MorphToMany|_PermissionQueryBuilder permissions()
     * @property _RoleCollection|Role[] $roles
     * @method MorphToMany|_RoleQueryBuilder roles()
     * @method _UserQueryBuilder newModelQuery()
     * @method _UserQueryBuilder newQuery()
     * @method static _UserQueryBuilder query()
     * @method static _UserCollection|User[] all()
     * @method _UserQueryBuilder permission(array|Collection|Permission1|string $permissions)
     * @method _UserQueryBuilder role(array|Collection|Role1|string $roles, string $guard = null)
     * @mixin _UserQueryBuilder
     */
    class User extends Model
    {
    }

    /**
     * @property int $id
     * @property int $user_id
     * @property int $category_id
     * @property string $title
     * @property string $avatar
     * @property string $bio
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Category $Category
     * @method BelongsTo|_CategoryQueryBuilder Category()
     * @property _UserModelImageCollection|UserModelImage[] $Images
     * @method HasMany|_UserModelImageQueryBuilder Images()
     * @property _ServiceCollection|Service[] $Services
     * @method HasMany|_ServiceQueryBuilder Services()
     * @property User $User
     * @method BelongsTo|_UserQueryBuilder User()
     * @method _UserModelQueryBuilder newModelQuery()
     * @method _UserModelQueryBuilder newQuery()
     * @method static _UserModelQueryBuilder query()
     * @method static _UserModelCollection|UserModel[] all()
     * @mixin _UserModelQueryBuilder
     */
    class UserModel extends Model
    {
    }

    /**
     * @property int $id
     * @property int $user_model_id
     * @property string $path
     * @property Carbon $created_at
     * @property Carbon $updated_at
     * @property UserModel $UserModel
     * @method BelongsTo|_UserModelQueryBuilder UserModel()
     * @method _UserModelImageQueryBuilder newModelQuery()
     * @method _UserModelImageQueryBuilder newQuery()
     * @method static _UserModelImageQueryBuilder query()
     * @method static _UserModelImageCollection|UserModelImage[] all()
     * @mixin _UserModelImageQueryBuilder
     */
    class UserModelImage extends Model
    {
    }
}

namespace Illuminate\Notifications {

    use Illuminate\Database\Eloquent\Model;
    use LaravelIdea\Helper\Illuminate\Notifications\_DatabaseNotificationCollection;
    use LaravelIdea\Helper\Illuminate\Notifications\_DatabaseNotificationQueryBuilder;

    /**
     * @method _DatabaseNotificationQueryBuilder newModelQuery()
     * @method _DatabaseNotificationQueryBuilder newQuery()
     * @method static _DatabaseNotificationQueryBuilder query()
     * @method static _DatabaseNotificationCollection|DatabaseNotification[] all()
     * @mixin _DatabaseNotificationQueryBuilder
     */
    class DatabaseNotification extends Model
    {
    }
}

namespace LaravelIdea\Helper {

    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\ConnectionInterface;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Query\Expression;
    use Illuminate\Support\Collection;

    /**
     * @see \Illuminate\Database\Query\Builder::select
     * @method $this select(array $columns = ['*'])
     * @see \Illuminate\Database\Query\Builder::paginate
     * @method $this paginate(int $perPage = 15, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @see \Illuminate\Database\Query\Builder::addSelect
     * @method $this addSelect(array $column)
     * @see \Illuminate\Database\Concerns\BuildsQueries::when
     * @method $this when($value, callable $callback, callable|null $default = null)
     * @see \Illuminate\Database\Query\Builder::whereIn
     * @method $this whereIn(string $column, $values, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Database\Query\Builder::orWhereExists
     * @method $this orWhereExists(\Closure $callback, bool $not = false)
     * @see \Illuminate\Database\Query\Builder::whereJsonLength
     * @method $this whereJsonLength(string $column, $operator, $value = null, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::orWhereNotIn
     * @method $this orWhereNotIn(string $column, $values)
     * @see \Illuminate\Database\Query\Builder::truncate
     * @method $this truncate()
     * @see \Illuminate\Database\Query\Builder::selectRaw
     * @method $this selectRaw(string $expression, array $bindings = [])
     * @see \Illuminate\Database\Query\Builder::insertOrIgnore
     * @method int insertOrIgnore(array $values)
     * @see \Illuminate\Database\Query\Builder::lock
     * @method $this lock(bool|string $value = true)
     * @see \Illuminate\Database\Query\Builder::join
     * @method $this join(string $table, \Closure|string $first, null|string $operator = null, null|string $second = null, string $type = 'inner', bool $where = false)
     * @see \Illuminate\Database\Query\Builder::unionAll
     * @method $this unionAll(\Closure|\Illuminate\Database\Query\Builder $query)
     * @see \Illuminate\Database\Query\Builder::whereMonth
     * @method $this whereMonth(string $column, string $operator, \DateTimeInterface|null|string $value = null, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::having
     * @method $this having(string $column, null|string $operator = null, null|string $value = null, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::orWhereNull
     * @method $this orWhereNull(string $column)
     * @see \Illuminate\Database\Query\Builder::whereNested
     * @method $this whereNested(\Closure $callback, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::joinWhere
     * @method $this joinWhere(string $table, \Closure|string $first, string $operator, string $second, string $type = 'inner')
     * @see \Illuminate\Database\Query\Builder::orWhereJsonContains
     * @method $this orWhereJsonContains(string $column, $value)
     * @see \Illuminate\Database\Query\Builder::raw
     * @method Expression raw($value)
     * @see \Illuminate\Database\Query\Builder::orderBy
     * @method $this orderBy(\Closure|\Illuminate\Database\Query\Builder|Expression|string $column, string $direction = 'asc')
     * @see \Illuminate\Database\Query\Builder::orWhereRowValues
     * @method $this orWhereRowValues(array $columns, string $operator, array $values)
     * @see \Illuminate\Database\Concerns\BuildsQueries::each
     * @method $this each(callable $callback, int $count = 1000)
     * @see \Illuminate\Database\Query\Builder::setBindings
     * @method $this setBindings(array $bindings, string $type = 'where')
     * @see \Illuminate\Database\Query\Builder::orWhereJsonLength
     * @method $this orWhereJsonLength(string $column, $operator, $value = null)
     * @see \Illuminate\Database\Query\Builder::whereRowValues
     * @method $this whereRowValues(array $columns, string $operator, array $values, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::useWritePdo
     * @method $this useWritePdo()
     * @see \Illuminate\Database\Query\Builder::orWhereIntegerInRaw
     * @method $this orWhereIntegerInRaw(string $column, array|Arrayable $values)
     * @see \Illuminate\Database\Query\Builder::orWhereNotExists
     * @method $this orWhereNotExists(\Closure $callback)
     * @see \Illuminate\Database\Query\Builder::orWhereIn
     * @method $this orWhereIn(string $column, $values)
     * @see \Illuminate\Database\Query\Builder::newQuery
     * @method $this newQuery()
     * @see \Illuminate\Database\Query\Builder::rightJoinSub
     * @method $this rightJoinSub(\Closure|\Illuminate\Database\Query\Builder|string $query, string $as, \Closure|string $first, null|string $operator = null, null|string $second = null)
     * @see \Illuminate\Database\Query\Builder::crossJoin
     * @method $this crossJoin(string $table, \Closure|null|string $first = null, null|string $operator = null, null|string $second = null)
     * @see \Illuminate\Database\Query\Builder::orderByDesc
     * @method $this orderByDesc(string $column)
     * @see \Illuminate\Database\Query\Builder::orWhereNotNull
     * @method $this orWhereNotNull(string $column)
     * @see \Illuminate\Database\Query\Builder::average
     * @method mixed average(string $column)
     * @see \Illuminate\Database\Query\Builder::existsOr
     * @method $this existsOr(\Closure $callback)
     * @see \Illuminate\Database\Query\Builder::getProcessor
     * @method $this getProcessor()
     * @see \Illuminate\Database\Query\Builder::increment
     * @method $this increment(string $column, float|int $amount = 1, array $extra = [])
     * @see \Illuminate\Database\Query\Builder::sum
     * @method int sum(string $column)
     * @see \Illuminate\Database\Query\Builder::skip
     * @method $this skip(int $value)
     * @see \Illuminate\Database\Query\Builder::havingRaw
     * @method $this havingRaw(string $sql, array $bindings = [], string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::leftJoinWhere
     * @method $this leftJoinWhere(string $table, \Closure|string $first, string $operator, string $second)
     * @see \Illuminate\Database\Query\Builder::doesntExistOr
     * @method $this doesntExistOr(\Closure $callback)
     * @see \Illuminate\Database\Query\Builder::orWhereColumn
     * @method $this orWhereColumn(array|string $first, null|string $operator = null, null|string $second = null)
     * @see \Illuminate\Database\Query\Builder::getRawBindings
     * @method $this getRawBindings()
     * @see \Illuminate\Database\Query\Builder::min
     * @method mixed min(string $column)
     * @see \Illuminate\Support\Traits\Macroable::hasMacro
     * @method $this hasMacro(string $name)
     * @see \Illuminate\Database\Query\Builder::whereNotExists
     * @method $this whereNotExists(\Closure $callback, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::whereIntegerInRaw
     * @method $this whereIntegerInRaw(string $column, array|Arrayable $values, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Database\Concerns\BuildsQueries::unless
     * @method $this unless($value, callable $callback, callable|null $default = null)
     * @see \Illuminate\Database\Query\Builder::whereDay
     * @method $this whereDay(string $column, string $operator, \DateTimeInterface|null|string $value = null, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::get
     * @method $this get(array|string $columns = ['*'])
     * @see \Illuminate\Database\Query\Builder::whereNotIn
     * @method $this whereNotIn(string $column, $values, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::whereTime
     * @method $this whereTime(string $column, string $operator, \DateTimeInterface|null|string $value = null, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::where
     * @method $this where(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::latest
     * @method $this latest(string $column = 'created_at')
     * @see \Illuminate\Database\Query\Builder::forNestedWhere
     * @method $this forNestedWhere()
     * @see \Illuminate\Database\Query\Builder::insertUsing
     * @method int insertUsing(array $columns, \Closure|\Illuminate\Database\Query\Builder|string $query)
     * @see \Illuminate\Database\Query\Builder::rightJoinWhere
     * @method $this rightJoinWhere(string $table, \Closure|string $first, string $operator, string $second)
     * @see \Illuminate\Database\Query\Builder::whereExists
     * @method $this whereExists(\Closure $callback, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Database\Query\Builder::max
     * @method mixed max(string $column)
     * @see \Illuminate\Database\Query\Builder::inRandomOrder
     * @method $this inRandomOrder(string $seed = '')
     * @see \Illuminate\Database\Query\Builder::havingBetween
     * @method $this havingBetween(string $column, array $values, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Database\Query\Builder::union
     * @method $this union(\Closure|\Illuminate\Database\Query\Builder $query, bool $all = false)
     * @see \Illuminate\Database\Query\Builder::groupBy
     * @method $this groupBy(array $groups)
     * @see \Illuminate\Database\Query\Builder::orWhereYear
     * @method $this orWhereYear(string $column, string $operator, \DateTimeInterface|int|null|string $value = null)
     * @see \Illuminate\Database\Query\Builder::orWhereDay
     * @method $this orWhereDay(string $column, string $operator, \DateTimeInterface|null|string $value = null)
     * @see \Illuminate\Database\Concerns\BuildsQueries::chunkById
     * @method $this chunkById(int $count, callable $callback, null|string $column = null, null|string $alias = null)
     * @see \Illuminate\Database\Query\Builder::joinSub
     * @method $this joinSub(\Closure|\Illuminate\Database\Query\Builder|string $query, string $as, \Closure|string $first, null|string $operator = null, null|string $second = null, string $type = 'inner', bool $where = false)
     * @see \Illuminate\Database\Query\Builder::whereDate
     * @method $this whereDate(string $column, string $operator, \DateTimeInterface|null|string $value = null, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::whereJsonDoesntContain
     * @method $this whereJsonDoesntContain(string $column, $value, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::oldest
     * @method $this oldest(string $column = 'created_at')
     * @see \Illuminate\Database\Query\Builder::decrement
     * @method $this decrement(string $column, float|int $amount = 1, array $extra = [])
     * @see \Illuminate\Database\Query\Builder::forPageAfterId
     * @method $this forPageAfterId(int $perPage = 15, int|null $lastId = 0, string $column = 'id')
     * @see \Illuminate\Database\Query\Builder::forPage
     * @method $this forPage(int $page, int $perPage = 15)
     * @see \Illuminate\Database\Query\Builder::exists
     * @method bool exists()
     * @see \Illuminate\Support\Traits\Macroable::macroCall
     * @method $this macroCall(string $method, array $parameters)
     * @see \Illuminate\Database\Query\Builder::selectSub
     * @method $this selectSub(\Closure|string $query, string $as)
     * @see \Illuminate\Database\Query\Builder::pluck
     * @method $this pluck(string $column, null|string $key = null)
     * @see \Illuminate\Database\Concerns\BuildsQueries::first
     * @method $this first(array|string $columns = ['*'])
     * @see \Illuminate\Database\Query\Builder::dd
     * @method void dd()
     * @see \Illuminate\Database\Query\Builder::whereColumn
     * @method $this whereColumn(array|string $first, null|string $operator = null, null|string $second = null, null|string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::prepareValueAndOperator
     * @method $this prepareValueAndOperator(string $value, string $operator, bool $useDefault = false)
     * @see \Illuminate\Database\Query\Builder::whereNull
     * @method $this whereNull(array|string $columns, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Database\Query\Builder::numericAggregate
     * @method $this numericAggregate(string $function, array $columns = ['*'])
     * @see \Illuminate\Database\Query\Builder::whereNotBetween
     * @method $this whereNotBetween(string $column, array $values, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::getConnection
     * @method ConnectionInterface getConnection()
     * @see \Illuminate\Database\Query\Builder::mergeBindings
     * @method $this mergeBindings(\Illuminate\Database\Query\Builder $query)
     * @see \Illuminate\Database\Query\Builder::whereIntegerNotInRaw
     * @method $this whereIntegerNotInRaw(string $column, array|Arrayable $values, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::orWhereRaw
     * @method $this orWhereRaw(string $sql, $bindings = [])
     * @see \Illuminate\Database\Query\Builder::orWhereJsonDoesntContain
     * @method $this orWhereJsonDoesntContain(string $column, $value)
     * @see \Illuminate\Database\Query\Builder::leftJoinSub
     * @method $this leftJoinSub(\Closure|\Illuminate\Database\Query\Builder|string $query, string $as, \Closure|string $first, null|string $operator = null, null|string $second = null)
     * @see \Illuminate\Database\Query\Builder::find
     * @method $this find(int|string $id, array $columns = ['*'])
     * @see \Illuminate\Database\Query\Builder::whereJsonContains
     * @method $this whereJsonContains(string $column, $value, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Database\Query\Builder::limit
     * @method $this limit(int $value)
     * @see \Illuminate\Database\Query\Builder::from
     * @method $this from(\Closure|\Illuminate\Database\Query\Builder|string $table, null|string $as = null)
     * @see \Illuminate\Database\Query\Builder::whereNotBetweenColumns
     * @method $this whereNotBetweenColumns(string $column, array $values, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::orWhereBetweenColumns
     * @method $this orWhereBetweenColumns(string $column, array $values)
     * @see \Illuminate\Database\Query\Builder::insertGetId
     * @method int insertGetId(array $values, null|string $sequence = null)
     * @see \Illuminate\Database\Query\Builder::whereBetween
     * @method $this whereBetween(string $column, array $values, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Database\Query\Builder::mergeWheres
     * @method $this mergeWheres(array $wheres, array $bindings)
     * @see \Illuminate\Database\Query\Builder::sharedLock
     * @method $this sharedLock()
     * @see \Illuminate\Database\Query\Builder::orderByRaw
     * @method $this orderByRaw(string $sql, array $bindings = [])
     * @see \Illuminate\Database\Concerns\BuildsQueries::tap
     * @method $this tap(callable $callback)
     * @see \Illuminate\Database\Query\Builder::doesntExist
     * @method bool doesntExist()
     * @see \Illuminate\Database\Query\Builder::simplePaginate
     * @method $this simplePaginate(int $perPage = 15, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @see \Illuminate\Database\Query\Builder::offset
     * @method $this offset(int $value)
     * @see \Illuminate\Database\Query\Builder::orWhereMonth
     * @method $this orWhereMonth(string $column, string $operator, \DateTimeInterface|null|string $value = null)
     * @see \Illuminate\Database\Query\Builder::whereNotNull
     * @method $this whereNotNull(array|string $columns, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::count
     * @method int count(string $columns = '*')
     * @see \Illuminate\Database\Query\Builder::orWhereNotBetween
     * @method $this orWhereNotBetween(string $column, array $values)
     * @see \Illuminate\Database\Query\Builder::fromRaw
     * @method $this fromRaw(string $expression, $bindings = [])
     * @see \Illuminate\Support\Traits\Macroable::mixin
     * @method $this mixin(object $mixin, bool $replace = true)
     * @see \Illuminate\Database\Query\Builder::take
     * @method $this take(int $value)
     * @see \Illuminate\Database\Query\Builder::orWhereNotBetweenColumns
     * @method $this orWhereNotBetweenColumns(string $column, array $values)
     * @see \Illuminate\Database\Query\Builder::updateOrInsert
     * @method $this updateOrInsert(array $attributes, array $values = [])
     * @see \Illuminate\Database\Query\Builder::addNestedWhereQuery
     * @method $this addNestedWhereQuery(\Illuminate\Database\Query\Builder $query, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::cursor
     * @method $this cursor()
     * @see \Illuminate\Database\Query\Builder::cloneWithout
     * @method $this cloneWithout(array $properties)
     * @see \Illuminate\Database\Query\Builder::whereBetweenColumns
     * @method $this whereBetweenColumns(string $column, array $values, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Database\Query\Builder::fromSub
     * @method $this fromSub(\Closure|\Illuminate\Database\Query\Builder|string $query, string $as)
     * @see \Illuminate\Database\Query\Builder::rightJoin
     * @method $this rightJoin(string $table, \Closure|string $first, null|string $operator = null, null|string $second = null)
     * @see \Illuminate\Database\Query\Builder::leftJoin
     * @method $this leftJoin(string $table, \Closure|string $first, null|string $operator = null, null|string $second = null)
     * @see \Illuminate\Database\Query\Builder::update
     * @method $this update(array $values)
     * @see \Illuminate\Database\Query\Builder::insert
     * @method bool insert(array $values)
     * @see \Illuminate\Database\Query\Builder::distinct
     * @method $this distinct()
     * @see \Illuminate\Database\Concerns\BuildsQueries::chunk
     * @method $this chunk(int $count, callable $callback)
     * @see \Illuminate\Database\Query\Builder::reorder
     * @method $this reorder(null|string $column = null, string $direction = 'asc')
     * @see \Illuminate\Database\Query\Builder::whereYear
     * @method $this whereYear(string $column, string $operator, \DateTimeInterface|int|null|string $value = null, string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::getCountForPagination
     * @method $this getCountForPagination(array $columns = ['*'])
     * @see \Illuminate\Database\Query\Builder::delete
     * @method $this delete($id = null)
     * @see \Illuminate\Database\Query\Builder::orWhereIntegerNotInRaw
     * @method $this orWhereIntegerNotInRaw(string $column, array|Arrayable $values)
     * @see \Illuminate\Database\Query\Builder::groupByRaw
     * @method $this groupByRaw(string $sql, array $bindings = [])
     * @see \Illuminate\Database\Query\Builder::aggregate
     * @method $this aggregate(string $function, array $columns = ['*'])
     * @see \Illuminate\Database\Query\Builder::orWhereDate
     * @method $this orWhereDate(string $column, string $operator, \DateTimeInterface|null|string $value = null)
     * @see \Illuminate\Database\Query\Builder::avg
     * @method mixed avg(string $column)
     * @see \Illuminate\Database\Query\Builder::addBinding
     * @method $this addBinding($value, string $type = 'where')
     * @see \Illuminate\Database\Query\Builder::getGrammar
     * @method $this getGrammar()
     * @see \Illuminate\Database\Query\Builder::lockForUpdate
     * @method $this lockForUpdate()
     * @see \Illuminate\Database\Concerns\BuildsQueries::eachById
     * @method $this eachById(callable $callback, int $count = 1000, null|string $column = null, null|string $alias = null)
     * @see \Illuminate\Database\Query\Builder::dump
     * @method void dump()
     * @see \Illuminate\Database\Query\Builder::implode
     * @method $this implode(string $column, string $glue = '')
     * @see \Illuminate\Database\Query\Builder::value
     * @method $this value(string $column)
     * @see \Illuminate\Database\Query\Builder::cloneWithoutBindings
     * @method $this cloneWithoutBindings(array $except)
     * @see \Illuminate\Database\Query\Builder::addWhereExistsQuery
     * @method $this addWhereExistsQuery(\Illuminate\Database\Query\Builder $query, string $boolean = 'and', bool $not = false)
     * @see \Illuminate\Support\Traits\Macroable::macro
     * @method $this macro(string $name, callable|object $macro)
     * @see \Illuminate\Database\Query\Builder::whereRaw
     * @method $this whereRaw(string $sql, $bindings = [], string $boolean = 'and')
     * @see \Illuminate\Database\Query\Builder::toSql
     * @method string toSql()
     * @see \Illuminate\Database\Query\Builder::orHaving
     * @method $this orHaving(string $column, null|string $operator = null, null|string $value = null)
     * @see \Illuminate\Database\Query\Builder::orHavingRaw
     * @method $this orHavingRaw(string $sql, array $bindings = [])
     * @see \Illuminate\Database\Query\Builder::getBindings
     * @method array getBindings()
     * @see \Illuminate\Database\Query\Builder::forPageBeforeId
     * @method $this forPageBeforeId(int $perPage = 15, int|null $lastId = 0, string $column = 'id')
     * @see \Illuminate\Database\Query\Builder::orWhereTime
     * @method $this orWhereTime(string $column, string $operator, \DateTimeInterface|null|string $value = null)
     * @see \Illuminate\Database\Query\Builder::orWhereBetween
     * @method $this orWhereBetween(string $column, array $values)
     * @see \Illuminate\Database\Query\Builder::orWhere
     * @method $this orWhere(array|\Closure|string $column, $operator = null, $value = null)
     * @see \Illuminate\Database\Query\Builder::dynamicWhere
     * @method $this dynamicWhere(string $method, array $parameters)
     */
    class _BaseBuilder extends Builder
    {
    }

    /**
     * @method Collection mapSpread(callable $callback)
     * @method Collection mapWithKeys(callable $callback)
     * @method Collection zip(array $items)
     * @method Collection partition(callable|string $key, $operator = null, $value = null)
     * @method Collection mapInto(string $class)
     * @method Collection mapToGroups(callable $callback)
     * @method Collection map(callable $callback)
     * @method Collection groupBy(array|callable|string $groupBy, bool $preserveKeys = false)
     * @method Collection pluck(array|string $value, null|string $key = null)
     * @method Collection pad(int $size, $value)
     * @method Collection split(int $numberOfGroups)
     * @method Collection combine($values)
     * @method Collection countBy(callable|string $countBy = null)
     * @method Collection mapToDictionary(callable $callback)
     * @method Collection keys()
     * @method Collection transform(callable $callback)
     * @method Collection flatMap(callable $callback)
     * @method Collection collapse()
     */
    class _BaseCollection extends Collection
    {
    }
}

namespace LaravelIdea\Helper\App {

    use App\Booking;
    use App\Category;
    use App\CategoryImage;
    use App\Configuration;
    use App\Customer;
    use App\Language;
    use App\RoleConfiguration;
    use App\Service;
    use App\ServiceImage;
    use App\ServiceTime;
    use App\Setting;
    use App\User;
    use App\UserModel;
    use App\UserModelImage;
    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Collection;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;
    use Spatie\Permission\Contracts\Permission;
    use Spatie\Permission\Contracts\Role;

    /**
     * @method Booking shift()
     * @method Booking pop()
     * @method Booking get($key, $default = null)
     * @method Booking pull($key, $default = null)
     * @method Booking first(callable $callback = null, $default = null)
     * @method Booking firstWhere(string $key, $operator = null, $value = null)
     * @method Booking[] all()
     * @method Booking last(callable $callback = null, $default = null)
     */
    class _BookingCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Booking[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _BookingQueryBuilder whereId($value)
     * @method _BookingQueryBuilder whereBookableType($value)
     * @method _BookingQueryBuilder whereBookableId($value)
     * @method _BookingQueryBuilder whereCustomerType($value)
     * @method _BookingQueryBuilder whereCustomerId($value)
     * @method _BookingQueryBuilder whereUserId($value)
     * @method _BookingQueryBuilder whereStartsAt($value)
     * @method _BookingQueryBuilder whereEndsAt($value)
     * @method _BookingQueryBuilder whereCanceledAt($value)
     * @method _BookingQueryBuilder whereTimezone($value)
     * @method _BookingQueryBuilder wherePrice($value)
     * @method _BookingQueryBuilder whereQuantity($value)
     * @method _BookingQueryBuilder whereTotalPaid($value)
     * @method _BookingQueryBuilder whereCurrency($value)
     * @method _BookingQueryBuilder whereFormula($value)
     * @method _BookingQueryBuilder whereOptions($value)
     * @method _BookingQueryBuilder whereNotes($value)
     * @method _BookingQueryBuilder whereBookingKey($value)
     * @method _BookingQueryBuilder whereStatus($value)
     * @method _BookingQueryBuilder whereCreatedAt($value)
     * @method _BookingQueryBuilder whereUpdatedAt($value)
     * @method _BookingQueryBuilder whereDeletedAt($value)
     * @method Booking create(array $attributes = [])
     * @method _BookingCollection|Booking[] cursor()
     * @method Booking|null find($id, array $columns = ['*'])
     * @method _BookingCollection|Booking[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Booking findOrFail($id, array $columns = ['*'])
     * @method _BookingCollection|Booking[] findOrNew($id, array $columns = ['*'])
     * @method Booking first(array|string $columns = ['*'])
     * @method Booking firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Booking firstOrCreate(array $attributes, array $values = [])
     * @method Booking firstOrFail(array $columns = ['*'])
     * @method Booking firstOrNew(array $attributes = [], array $values = [])
     * @method Booking firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Booking forceCreate(array $attributes)
     * @method _BookingCollection|Booking[] fromQuery(string $query, array $bindings = [])
     * @method _BookingCollection|Booking[] get(array|string $columns = ['*'])
     * @method Booking getModel()
     * @method Booking[] getModels(array|string $columns = ['*'])
     * @method _BookingCollection|Booking[] hydrate(array $items)
     * @method Booking make(array $attributes = [])
     * @method Booking newModelInstance(array $attributes = [])
     * @method Booking updateOrCreate(array $attributes, array $values = [])
     * @method _BookingQueryBuilder cancelled()
     * @method _BookingQueryBuilder cancelledAfter(string $date)
     * @method _BookingQueryBuilder cancelledBefore(string $date)
     * @method _BookingQueryBuilder cancelledBetween(string $startsAt, string $endsAt)
     * @method _BookingQueryBuilder current()
     * @method _BookingQueryBuilder endsAfter(string $date)
     * @method _BookingQueryBuilder endsBefore(string $date)
     * @method _BookingQueryBuilder endsBetween(string $startsAt, string $endsAt)
     * @method _BookingQueryBuilder future()
     * @method _BookingQueryBuilder ofBookable(Model $bookable)
     * @method _BookingQueryBuilder ofCustomer(Model $customer)
     * @method _BookingQueryBuilder past()
     * @method _BookingQueryBuilder range(string $startsAt, string $endsAt)
     * @method _BookingQueryBuilder startsAfter(string $date)
     * @method _BookingQueryBuilder startsBefore(string $date)
     * @method _BookingQueryBuilder startsBetween(string $startsAt, string $endsAt)
     * @method _BookingQueryBuilder withOptions()
     */
    class _BookingQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method Category shift()
     * @method Category pop()
     * @method Category get($key, $default = null)
     * @method Category pull($key, $default = null)
     * @method Category first(callable $callback = null, $default = null)
     * @method Category firstWhere(string $key, $operator = null, $value = null)
     * @method Category[] all()
     * @method Category last(callable $callback = null, $default = null)
     */
    class _CategoryCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Category[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method CategoryImage shift()
     * @method CategoryImage pop()
     * @method CategoryImage get($key, $default = null)
     * @method CategoryImage pull($key, $default = null)
     * @method CategoryImage first(callable $callback = null, $default = null)
     * @method CategoryImage firstWhere(string $key, $operator = null, $value = null)
     * @method CategoryImage[] all()
     * @method CategoryImage last(callable $callback = null, $default = null)
     */
    class _CategoryImageCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return CategoryImage[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _CategoryImageQueryBuilder whereId($value)
     * @method _CategoryImageQueryBuilder whereCategoryId($value)
     * @method _CategoryImageQueryBuilder wherePath($value)
     * @method _CategoryImageQueryBuilder whereCreatedAt($value)
     * @method _CategoryImageQueryBuilder whereUpdatedAt($value)
     * @method CategoryImage create(array $attributes = [])
     * @method _CategoryImageCollection|CategoryImage[] cursor()
     * @method CategoryImage|null find($id, array $columns = ['*'])
     * @method _CategoryImageCollection|CategoryImage[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method CategoryImage findOrFail($id, array $columns = ['*'])
     * @method _CategoryImageCollection|CategoryImage[] findOrNew($id, array $columns = ['*'])
     * @method CategoryImage first(array|string $columns = ['*'])
     * @method CategoryImage firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method CategoryImage firstOrCreate(array $attributes, array $values = [])
     * @method CategoryImage firstOrFail(array $columns = ['*'])
     * @method CategoryImage firstOrNew(array $attributes = [], array $values = [])
     * @method CategoryImage firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method CategoryImage forceCreate(array $attributes)
     * @method _CategoryImageCollection|CategoryImage[] fromQuery(string $query, array $bindings = [])
     * @method _CategoryImageCollection|CategoryImage[] get(array|string $columns = ['*'])
     * @method CategoryImage getModel()
     * @method CategoryImage[] getModels(array|string $columns = ['*'])
     * @method _CategoryImageCollection|CategoryImage[] hydrate(array $items)
     * @method CategoryImage make(array $attributes = [])
     * @method CategoryImage newModelInstance(array $attributes = [])
     * @method CategoryImage updateOrCreate(array $attributes, array $values = [])
     */
    class _CategoryImageQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method _CategoryQueryBuilder whereId($value)
     * @method _CategoryQueryBuilder whereUserId($value)
     * @method _CategoryQueryBuilder whereTitle($value)
     * @method _CategoryQueryBuilder whereAvatar($value)
     * @method _CategoryQueryBuilder whereVideo($value)
     * @method _CategoryQueryBuilder whereDescription($value)
     * @method _CategoryQueryBuilder whereCreatedAt($value)
     * @method _CategoryQueryBuilder whereUpdatedAt($value)
     * @method Category create(array $attributes = [])
     * @method _CategoryCollection|Category[] cursor()
     * @method Category|null find($id, array $columns = ['*'])
     * @method _CategoryCollection|Category[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Category findOrFail($id, array $columns = ['*'])
     * @method _CategoryCollection|Category[] findOrNew($id, array $columns = ['*'])
     * @method Category first(array|string $columns = ['*'])
     * @method Category firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Category firstOrCreate(array $attributes, array $values = [])
     * @method Category firstOrFail(array $columns = ['*'])
     * @method Category firstOrNew(array $attributes = [], array $values = [])
     * @method Category firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Category forceCreate(array $attributes)
     * @method _CategoryCollection|Category[] fromQuery(string $query, array $bindings = [])
     * @method _CategoryCollection|Category[] get(array|string $columns = ['*'])
     * @method Category getModel()
     * @method Category[] getModels(array|string $columns = ['*'])
     * @method _CategoryCollection|Category[] hydrate(array $items)
     * @method Category make(array $attributes = [])
     * @method Category newModelInstance(array $attributes = [])
     * @method Category updateOrCreate(array $attributes, array $values = [])
     */
    class _CategoryQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method Configuration shift()
     * @method Configuration pop()
     * @method Configuration get($key, $default = null)
     * @method Configuration pull($key, $default = null)
     * @method Configuration first(callable $callback = null, $default = null)
     * @method Configuration firstWhere(string $key, $operator = null, $value = null)
     * @method Configuration[] all()
     * @method Configuration last(callable $callback = null, $default = null)
     */
    class _ConfigurationCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Configuration[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _ConfigurationQueryBuilder whereId($value)
     * @method _ConfigurationQueryBuilder whereKey($value)
     * @method _ConfigurationQueryBuilder whereValue($value)
     * @method _ConfigurationQueryBuilder whereCreatedAt($value)
     * @method _ConfigurationQueryBuilder whereUpdatedAt($value)
     * @method Configuration create(array $attributes = [])
     * @method _ConfigurationCollection|Configuration[] cursor()
     * @method Configuration|null find($id, array $columns = ['*'])
     * @method _ConfigurationCollection|Configuration[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Configuration findOrFail($id, array $columns = ['*'])
     * @method _ConfigurationCollection|Configuration[] findOrNew($id, array $columns = ['*'])
     * @method Configuration first(array|string $columns = ['*'])
     * @method Configuration firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Configuration firstOrCreate(array $attributes, array $values = [])
     * @method Configuration firstOrFail(array $columns = ['*'])
     * @method Configuration firstOrNew(array $attributes = [], array $values = [])
     * @method Configuration firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Configuration forceCreate(array $attributes)
     * @method _ConfigurationCollection|Configuration[] fromQuery(string $query, array $bindings = [])
     * @method _ConfigurationCollection|Configuration[] get(array|string $columns = ['*'])
     * @method Configuration getModel()
     * @method Configuration[] getModels(array|string $columns = ['*'])
     * @method _ConfigurationCollection|Configuration[] hydrate(array $items)
     * @method Configuration make(array $attributes = [])
     * @method Configuration newModelInstance(array $attributes = [])
     * @method Configuration updateOrCreate(array $attributes, array $values = [])
     */
    class _ConfigurationQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method Customer shift()
     * @method Customer pop()
     * @method Customer get($key, $default = null)
     * @method Customer pull($key, $default = null)
     * @method Customer first(callable $callback = null, $default = null)
     * @method Customer firstWhere(string $key, $operator = null, $value = null)
     * @method Customer[] all()
     * @method Customer last(callable $callback = null, $default = null)
     */
    class _CustomerCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Customer[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _CustomerQueryBuilder whereId($value)
     * @method _CustomerQueryBuilder whereName($value)
     * @method _CustomerQueryBuilder whereUserId($value)
     * @method _CustomerQueryBuilder whereEmail($value)
     * @method _CustomerQueryBuilder whereEmailVerifiedAt($value)
     * @method _CustomerQueryBuilder whereAvatar($value)
     * @method _CustomerQueryBuilder whereIsDeleted($value)
     * @method _CustomerQueryBuilder whereRememberToken($value)
     * @method _CustomerQueryBuilder whereCreatedAt($value)
     * @method _CustomerQueryBuilder whereUpdatedAt($value)
     * @method Customer create(array $attributes = [])
     * @method _CustomerCollection|Customer[] cursor()
     * @method Customer|null find($id, array $columns = ['*'])
     * @method _CustomerCollection|Customer[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Customer findOrFail($id, array $columns = ['*'])
     * @method _CustomerCollection|Customer[] findOrNew($id, array $columns = ['*'])
     * @method Customer first(array|string $columns = ['*'])
     * @method Customer firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Customer firstOrCreate(array $attributes, array $values = [])
     * @method Customer firstOrFail(array $columns = ['*'])
     * @method Customer firstOrNew(array $attributes = [], array $values = [])
     * @method Customer firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Customer forceCreate(array $attributes)
     * @method _CustomerCollection|Customer[] fromQuery(string $query, array $bindings = [])
     * @method _CustomerCollection|Customer[] get(array|string $columns = ['*'])
     * @method Customer getModel()
     * @method Customer[] getModels(array|string $columns = ['*'])
     * @method _CustomerCollection|Customer[] hydrate(array $items)
     * @method Customer make(array $attributes = [])
     * @method Customer newModelInstance(array $attributes = [])
     * @method Customer updateOrCreate(array $attributes, array $values = [])
     */
    class _CustomerQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method Language shift()
     * @method Language pop()
     * @method Language get($key, $default = null)
     * @method Language pull($key, $default = null)
     * @method Language first(callable $callback = null, $default = null)
     * @method Language firstWhere(string $key, $operator = null, $value = null)
     * @method Language[] all()
     * @method Language last(callable $callback = null, $default = null)
     */
    class _LanguageCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Language[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _LanguageQueryBuilder whereId($value)
     * @method _LanguageQueryBuilder whereName($value)
     * @method _LanguageQueryBuilder whereRtlSupport($value)
     * @method _LanguageQueryBuilder whereLocale($value)
     * @method _LanguageQueryBuilder whereCreatedAt($value)
     * @method _LanguageQueryBuilder whereUpdatedAt($value)
     * @method Language create(array $attributes = [])
     * @method _LanguageCollection|Language[] cursor()
     * @method Language|null find($id, array $columns = ['*'])
     * @method _LanguageCollection|Language[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Language findOrFail($id, array $columns = ['*'])
     * @method _LanguageCollection|Language[] findOrNew($id, array $columns = ['*'])
     * @method Language first(array|string $columns = ['*'])
     * @method Language firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Language firstOrCreate(array $attributes, array $values = [])
     * @method Language firstOrFail(array $columns = ['*'])
     * @method Language firstOrNew(array $attributes = [], array $values = [])
     * @method Language firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Language forceCreate(array $attributes)
     * @method _LanguageCollection|Language[] fromQuery(string $query, array $bindings = [])
     * @method _LanguageCollection|Language[] get(array|string $columns = ['*'])
     * @method Language getModel()
     * @method Language[] getModels(array|string $columns = ['*'])
     * @method _LanguageCollection|Language[] hydrate(array $items)
     * @method Language make(array $attributes = [])
     * @method Language newModelInstance(array $attributes = [])
     * @method Language updateOrCreate(array $attributes, array $values = [])
     */
    class _LanguageQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method RoleConfiguration shift()
     * @method RoleConfiguration pop()
     * @method RoleConfiguration get($key, $default = null)
     * @method RoleConfiguration pull($key, $default = null)
     * @method RoleConfiguration first(callable $callback = null, $default = null)
     * @method RoleConfiguration firstWhere(string $key, $operator = null, $value = null)
     * @method RoleConfiguration[] all()
     * @method RoleConfiguration last(callable $callback = null, $default = null)
     */
    class _RoleConfigurationCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return RoleConfiguration[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _RoleConfigurationQueryBuilder whereId($value)
     * @method _RoleConfigurationQueryBuilder whereRoleId($value)
     * @method _RoleConfigurationQueryBuilder whereConfigurationId($value)
     * @method _RoleConfigurationQueryBuilder whereCreatedAt($value)
     * @method _RoleConfigurationQueryBuilder whereUpdatedAt($value)
     * @method RoleConfiguration create(array $attributes = [])
     * @method _RoleConfigurationCollection|RoleConfiguration[] cursor()
     * @method RoleConfiguration|null find($id, array $columns = ['*'])
     * @method _RoleConfigurationCollection|RoleConfiguration[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method RoleConfiguration findOrFail($id, array $columns = ['*'])
     * @method _RoleConfigurationCollection|RoleConfiguration[] findOrNew($id, array $columns = ['*'])
     * @method RoleConfiguration first(array|string $columns = ['*'])
     * @method RoleConfiguration firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method RoleConfiguration firstOrCreate(array $attributes, array $values = [])
     * @method RoleConfiguration firstOrFail(array $columns = ['*'])
     * @method RoleConfiguration firstOrNew(array $attributes = [], array $values = [])
     * @method RoleConfiguration firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method RoleConfiguration forceCreate(array $attributes)
     * @method _RoleConfigurationCollection|RoleConfiguration[] fromQuery(string $query, array $bindings = [])
     * @method _RoleConfigurationCollection|RoleConfiguration[] get(array|string $columns = ['*'])
     * @method RoleConfiguration getModel()
     * @method RoleConfiguration[] getModels(array|string $columns = ['*'])
     * @method _RoleConfigurationCollection|RoleConfiguration[] hydrate(array $items)
     * @method RoleConfiguration make(array $attributes = [])
     * @method RoleConfiguration newModelInstance(array $attributes = [])
     * @method RoleConfiguration updateOrCreate(array $attributes, array $values = [])
     */
    class _RoleConfigurationQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method Service shift()
     * @method Service pop()
     * @method Service get($key, $default = null)
     * @method Service pull($key, $default = null)
     * @method Service first(callable $callback = null, $default = null)
     * @method Service firstWhere(string $key, $operator = null, $value = null)
     * @method Service[] all()
     * @method Service last(callable $callback = null, $default = null)
     */
    class _ServiceCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Service[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method ServiceImage shift()
     * @method ServiceImage pop()
     * @method ServiceImage get($key, $default = null)
     * @method ServiceImage pull($key, $default = null)
     * @method ServiceImage first(callable $callback = null, $default = null)
     * @method ServiceImage firstWhere(string $key, $operator = null, $value = null)
     * @method ServiceImage[] all()
     * @method ServiceImage last(callable $callback = null, $default = null)
     */
    class _ServiceImageCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return ServiceImage[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _ServiceImageQueryBuilder whereId($value)
     * @method _ServiceImageQueryBuilder whereServiceId($value)
     * @method _ServiceImageQueryBuilder wherePath($value)
     * @method _ServiceImageQueryBuilder whereCreatedAt($value)
     * @method _ServiceImageQueryBuilder whereUpdatedAt($value)
     * @method ServiceImage create(array $attributes = [])
     * @method _ServiceImageCollection|ServiceImage[] cursor()
     * @method ServiceImage|null find($id, array $columns = ['*'])
     * @method _ServiceImageCollection|ServiceImage[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method ServiceImage findOrFail($id, array $columns = ['*'])
     * @method _ServiceImageCollection|ServiceImage[] findOrNew($id, array $columns = ['*'])
     * @method ServiceImage first(array|string $columns = ['*'])
     * @method ServiceImage firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method ServiceImage firstOrCreate(array $attributes, array $values = [])
     * @method ServiceImage firstOrFail(array $columns = ['*'])
     * @method ServiceImage firstOrNew(array $attributes = [], array $values = [])
     * @method ServiceImage firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ServiceImage forceCreate(array $attributes)
     * @method _ServiceImageCollection|ServiceImage[] fromQuery(string $query, array $bindings = [])
     * @method _ServiceImageCollection|ServiceImage[] get(array|string $columns = ['*'])
     * @method ServiceImage getModel()
     * @method ServiceImage[] getModels(array|string $columns = ['*'])
     * @method _ServiceImageCollection|ServiceImage[] hydrate(array $items)
     * @method ServiceImage make(array $attributes = [])
     * @method ServiceImage newModelInstance(array $attributes = [])
     * @method ServiceImage updateOrCreate(array $attributes, array $values = [])
     */
    class _ServiceImageQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method _ServiceQueryBuilder whereId($value)
     * @method _ServiceQueryBuilder whereUserId($value)
     * @method _ServiceQueryBuilder whereUserModelId($value)
     * @method _ServiceQueryBuilder whereAvatar($value)
     * @method _ServiceQueryBuilder whereTitle($value)
     * @method _ServiceQueryBuilder whereDescription($value)
     * @method _ServiceQueryBuilder wherePrice($value)
     * @method _ServiceQueryBuilder whereDiscountPrice($value)
     * @method _ServiceQueryBuilder whereUnit($value)
     * @method _ServiceQueryBuilder whereAmount($value)
     * @method _ServiceQueryBuilder whereDuration($value)
     * @method _ServiceQueryBuilder whereCreatedAt($value)
     * @method _ServiceQueryBuilder whereUpdatedAt($value)
     * @method Service create(array $attributes = [])
     * @method _ServiceCollection|Service[] cursor()
     * @method Service|null find($id, array $columns = ['*'])
     * @method _ServiceCollection|Service[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Service findOrFail($id, array $columns = ['*'])
     * @method _ServiceCollection|Service[] findOrNew($id, array $columns = ['*'])
     * @method Service first(array|string $columns = ['*'])
     * @method Service firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Service firstOrCreate(array $attributes, array $values = [])
     * @method Service firstOrFail(array $columns = ['*'])
     * @method Service firstOrNew(array $attributes = [], array $values = [])
     * @method Service firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Service forceCreate(array $attributes)
     * @method _ServiceCollection|Service[] fromQuery(string $query, array $bindings = [])
     * @method _ServiceCollection|Service[] get(array|string $columns = ['*'])
     * @method Service getModel()
     * @method Service[] getModels(array|string $columns = ['*'])
     * @method _ServiceCollection|Service[] hydrate(array $items)
     * @method Service make(array $attributes = [])
     * @method Service newModelInstance(array $attributes = [])
     * @method Service updateOrCreate(array $attributes, array $values = [])
     */
    class _ServiceQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method ServiceTime shift()
     * @method ServiceTime pop()
     * @method ServiceTime get($key, $default = null)
     * @method ServiceTime pull($key, $default = null)
     * @method ServiceTime first(callable $callback = null, $default = null)
     * @method ServiceTime firstWhere(string $key, $operator = null, $value = null)
     * @method ServiceTime[] all()
     * @method ServiceTime last(callable $callback = null, $default = null)
     */
    class _ServiceTimeCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return ServiceTime[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _ServiceTimeQueryBuilder whereId($value)
     * @method _ServiceTimeQueryBuilder whereServiceId($value)
     * @method _ServiceTimeQueryBuilder whereDate($value)
     * @method _ServiceTimeQueryBuilder whereTime($value)
     * @method _ServiceTimeQueryBuilder whereCreatedAt($value)
     * @method _ServiceTimeQueryBuilder whereUpdatedAt($value)
     * @method ServiceTime create(array $attributes = [])
     * @method _ServiceTimeCollection|ServiceTime[] cursor()
     * @method ServiceTime|null find($id, array $columns = ['*'])
     * @method _ServiceTimeCollection|ServiceTime[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method ServiceTime findOrFail($id, array $columns = ['*'])
     * @method _ServiceTimeCollection|ServiceTime[] findOrNew($id, array $columns = ['*'])
     * @method ServiceTime first(array|string $columns = ['*'])
     * @method ServiceTime firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method ServiceTime firstOrCreate(array $attributes, array $values = [])
     * @method ServiceTime firstOrFail(array $columns = ['*'])
     * @method ServiceTime firstOrNew(array $attributes = [], array $values = [])
     * @method ServiceTime firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ServiceTime forceCreate(array $attributes)
     * @method _ServiceTimeCollection|ServiceTime[] fromQuery(string $query, array $bindings = [])
     * @method _ServiceTimeCollection|ServiceTime[] get(array|string $columns = ['*'])
     * @method ServiceTime getModel()
     * @method ServiceTime[] getModels(array|string $columns = ['*'])
     * @method _ServiceTimeCollection|ServiceTime[] hydrate(array $items)
     * @method ServiceTime make(array $attributes = [])
     * @method ServiceTime newModelInstance(array $attributes = [])
     * @method ServiceTime updateOrCreate(array $attributes, array $values = [])
     */
    class _ServiceTimeQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method Setting shift()
     * @method Setting pop()
     * @method Setting get($key, $default = null)
     * @method Setting pull($key, $default = null)
     * @method Setting first(callable $callback = null, $default = null)
     * @method Setting firstWhere(string $key, $operator = null, $value = null)
     * @method Setting[] all()
     * @method Setting last(callable $callback = null, $default = null)
     */
    class _SettingCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Setting[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _SettingQueryBuilder whereId($value)
     * @method _SettingQueryBuilder whereConfigurationId($value)
     * @method _SettingQueryBuilder whereValue($value)
     * @method _SettingQueryBuilder whereUserId($value)
     * @method _SettingQueryBuilder whereCreatedAt($value)
     * @method _SettingQueryBuilder whereUpdatedAt($value)
     * @method Setting create(array $attributes = [])
     * @method _SettingCollection|Setting[] cursor()
     * @method Setting|null find($id, array $columns = ['*'])
     * @method _SettingCollection|Setting[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Setting findOrFail($id, array $columns = ['*'])
     * @method _SettingCollection|Setting[] findOrNew($id, array $columns = ['*'])
     * @method Setting first(array|string $columns = ['*'])
     * @method Setting firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Setting firstOrCreate(array $attributes, array $values = [])
     * @method Setting firstOrFail(array $columns = ['*'])
     * @method Setting firstOrNew(array $attributes = [], array $values = [])
     * @method Setting firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Setting forceCreate(array $attributes)
     * @method _SettingCollection|Setting[] fromQuery(string $query, array $bindings = [])
     * @method _SettingCollection|Setting[] get(array|string $columns = ['*'])
     * @method Setting getModel()
     * @method Setting[] getModels(array|string $columns = ['*'])
     * @method _SettingCollection|Setting[] hydrate(array $items)
     * @method Setting make(array $attributes = [])
     * @method Setting newModelInstance(array $attributes = [])
     * @method Setting updateOrCreate(array $attributes, array $values = [])
     */
    class _SettingQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method User shift()
     * @method User pop()
     * @method User get($key, $default = null)
     * @method User pull($key, $default = null)
     * @method User first(callable $callback = null, $default = null)
     * @method User firstWhere(string $key, $operator = null, $value = null)
     * @method User[] all()
     * @method User last(callable $callback = null, $default = null)
     */
    class _UserCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return User[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method UserModel shift()
     * @method UserModel pop()
     * @method UserModel get($key, $default = null)
     * @method UserModel pull($key, $default = null)
     * @method UserModel first(callable $callback = null, $default = null)
     * @method UserModel firstWhere(string $key, $operator = null, $value = null)
     * @method UserModel[] all()
     * @method UserModel last(callable $callback = null, $default = null)
     */
    class _UserModelCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return UserModel[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method UserModelImage shift()
     * @method UserModelImage pop()
     * @method UserModelImage get($key, $default = null)
     * @method UserModelImage pull($key, $default = null)
     * @method UserModelImage first(callable $callback = null, $default = null)
     * @method UserModelImage firstWhere(string $key, $operator = null, $value = null)
     * @method UserModelImage[] all()
     * @method UserModelImage last(callable $callback = null, $default = null)
     */
    class _UserModelImageCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return UserModelImage[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _UserModelImageQueryBuilder whereId($value)
     * @method _UserModelImageQueryBuilder whereUserModelId($value)
     * @method _UserModelImageQueryBuilder wherePath($value)
     * @method _UserModelImageQueryBuilder whereCreatedAt($value)
     * @method _UserModelImageQueryBuilder whereUpdatedAt($value)
     * @method UserModelImage create(array $attributes = [])
     * @method _UserModelImageCollection|UserModelImage[] cursor()
     * @method UserModelImage|null find($id, array $columns = ['*'])
     * @method _UserModelImageCollection|UserModelImage[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method UserModelImage findOrFail($id, array $columns = ['*'])
     * @method _UserModelImageCollection|UserModelImage[] findOrNew($id, array $columns = ['*'])
     * @method UserModelImage first(array|string $columns = ['*'])
     * @method UserModelImage firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method UserModelImage firstOrCreate(array $attributes, array $values = [])
     * @method UserModelImage firstOrFail(array $columns = ['*'])
     * @method UserModelImage firstOrNew(array $attributes = [], array $values = [])
     * @method UserModelImage firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method UserModelImage forceCreate(array $attributes)
     * @method _UserModelImageCollection|UserModelImage[] fromQuery(string $query, array $bindings = [])
     * @method _UserModelImageCollection|UserModelImage[] get(array|string $columns = ['*'])
     * @method UserModelImage getModel()
     * @method UserModelImage[] getModels(array|string $columns = ['*'])
     * @method _UserModelImageCollection|UserModelImage[] hydrate(array $items)
     * @method UserModelImage make(array $attributes = [])
     * @method UserModelImage newModelInstance(array $attributes = [])
     * @method UserModelImage updateOrCreate(array $attributes, array $values = [])
     */
    class _UserModelImageQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method _UserModelQueryBuilder whereId($value)
     * @method _UserModelQueryBuilder whereUserId($value)
     * @method _UserModelQueryBuilder whereCategoryId($value)
     * @method _UserModelQueryBuilder whereTitle($value)
     * @method _UserModelQueryBuilder whereAvatar($value)
     * @method _UserModelQueryBuilder whereBio($value)
     * @method _UserModelQueryBuilder whereCreatedAt($value)
     * @method _UserModelQueryBuilder whereUpdatedAt($value)
     * @method UserModel create(array $attributes = [])
     * @method _UserModelCollection|UserModel[] cursor()
     * @method UserModel|null find($id, array $columns = ['*'])
     * @method _UserModelCollection|UserModel[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method UserModel findOrFail($id, array $columns = ['*'])
     * @method _UserModelCollection|UserModel[] findOrNew($id, array $columns = ['*'])
     * @method UserModel first(array|string $columns = ['*'])
     * @method UserModel firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method UserModel firstOrCreate(array $attributes, array $values = [])
     * @method UserModel firstOrFail(array $columns = ['*'])
     * @method UserModel firstOrNew(array $attributes = [], array $values = [])
     * @method UserModel firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method UserModel forceCreate(array $attributes)
     * @method _UserModelCollection|UserModel[] fromQuery(string $query, array $bindings = [])
     * @method _UserModelCollection|UserModel[] get(array|string $columns = ['*'])
     * @method UserModel getModel()
     * @method UserModel[] getModels(array|string $columns = ['*'])
     * @method _UserModelCollection|UserModel[] hydrate(array $items)
     * @method UserModel make(array $attributes = [])
     * @method UserModel newModelInstance(array $attributes = [])
     * @method UserModel updateOrCreate(array $attributes, array $values = [])
     */
    class _UserModelQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method _UserQueryBuilder whereId($value)
     * @method _UserQueryBuilder whereName($value)
     * @method _UserQueryBuilder whereUsername($value)
     * @method _UserQueryBuilder whereEmail($value)
     * @method _UserQueryBuilder whereEmailVerifiedAt($value)
     * @method _UserQueryBuilder wherePassword($value)
     * @method _UserQueryBuilder whereAvatar($value)
     * @method _UserQueryBuilder whereIsDeleted($value)
     * @method _UserQueryBuilder whereLevel($value)
     * @method _UserQueryBuilder whereRef($value)
     * @method _UserQueryBuilder whereRememberToken($value)
     * @method _UserQueryBuilder whereCreatedAt($value)
     * @method _UserQueryBuilder whereUpdatedAt($value)
     * @method User create(array $attributes = [])
     * @method _UserCollection|User[] cursor()
     * @method User|null find($id, array $columns = ['*'])
     * @method _UserCollection|User[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method User findOrFail($id, array $columns = ['*'])
     * @method _UserCollection|User[] findOrNew($id, array $columns = ['*'])
     * @method User first(array|string $columns = ['*'])
     * @method User firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method User firstOrCreate(array $attributes, array $values = [])
     * @method User firstOrFail(array $columns = ['*'])
     * @method User firstOrNew(array $attributes = [], array $values = [])
     * @method User firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method User forceCreate(array $attributes)
     * @method _UserCollection|User[] fromQuery(string $query, array $bindings = [])
     * @method _UserCollection|User[] get(array|string $columns = ['*'])
     * @method User getModel()
     * @method User[] getModels(array|string $columns = ['*'])
     * @method _UserCollection|User[] hydrate(array $items)
     * @method User make(array $attributes = [])
     * @method User newModelInstance(array $attributes = [])
     * @method User updateOrCreate(array $attributes, array $values = [])
     * @method _UserQueryBuilder permission(array|Collection|Permission|string $permissions)
     * @method _UserQueryBuilder role(array|Collection|Role|string $roles, string $guard = null)
     */
    class _UserQueryBuilder extends _BaseBuilder
    {
    }
}

namespace LaravelIdea\Helper\Illuminate\Notifications {

    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Notifications\DatabaseNotification;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;

    /**
     * @method DatabaseNotification shift()
     * @method DatabaseNotification pop()
     * @method DatabaseNotification get($key, $default = null)
     * @method DatabaseNotification pull($key, $default = null)
     * @method DatabaseNotification first(callable $callback = null, $default = null)
     * @method DatabaseNotification firstWhere(string $key, $operator = null, $value = null)
     * @method DatabaseNotification[] all()
     * @method DatabaseNotification last(callable $callback = null, $default = null)
     */
    class _DatabaseNotificationCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return DatabaseNotification[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method DatabaseNotification create(array $attributes = [])
     * @method _DatabaseNotificationCollection|DatabaseNotification[] cursor()
     * @method DatabaseNotification|null find($id, array $columns = ['*'])
     * @method _DatabaseNotificationCollection|DatabaseNotification[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method DatabaseNotification findOrFail($id, array $columns = ['*'])
     * @method _DatabaseNotificationCollection|DatabaseNotification[] findOrNew($id, array $columns = ['*'])
     * @method DatabaseNotification first(array|string $columns = ['*'])
     * @method DatabaseNotification firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method DatabaseNotification firstOrCreate(array $attributes, array $values = [])
     * @method DatabaseNotification firstOrFail(array $columns = ['*'])
     * @method DatabaseNotification firstOrNew(array $attributes = [], array $values = [])
     * @method DatabaseNotification firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method DatabaseNotification forceCreate(array $attributes)
     * @method _DatabaseNotificationCollection|DatabaseNotification[] fromQuery(string $query, array $bindings = [])
     * @method _DatabaseNotificationCollection|DatabaseNotification[] get(array|string $columns = ['*'])
     * @method DatabaseNotification getModel()
     * @method DatabaseNotification[] getModels(array|string $columns = ['*'])
     * @method _DatabaseNotificationCollection|DatabaseNotification[] hydrate(array $items)
     * @method DatabaseNotification make(array $attributes = [])
     * @method DatabaseNotification newModelInstance(array $attributes = [])
     * @method DatabaseNotification updateOrCreate(array $attributes, array $values = [])
     */
    class _DatabaseNotificationQueryBuilder extends _BaseBuilder
    {
    }
}

namespace LaravelIdea\Helper\Rinvex\Bookings\Models {

    use Illuminate\Contracts\Support\Arrayable;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;
    use Rinvex\Bookings\Models\TicketableBooking;
    use Rinvex\Bookings\Models\TicketableTicket;

    /**
     * @method TicketableBooking shift()
     * @method TicketableBooking pop()
     * @method TicketableBooking get($key, $default = null)
     * @method TicketableBooking pull($key, $default = null)
     * @method TicketableBooking first(callable $callback = null, $default = null)
     * @method TicketableBooking firstWhere(string $key, $operator = null, $value = null)
     * @method TicketableBooking[] all()
     * @method TicketableBooking last(callable $callback = null, $default = null)
     */
    class _TicketableBookingCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return TicketableBooking[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _TicketableBookingQueryBuilder whereId($value)
     * @method _TicketableBookingQueryBuilder whereTicketId($value)
     * @method _TicketableBookingQueryBuilder whereCustomerId($value)
     * @method _TicketableBookingQueryBuilder wherePaid($value)
     * @method _TicketableBookingQueryBuilder whereCurrency($value)
     * @method _TicketableBookingQueryBuilder whereIsApproved($value)
     * @method _TicketableBookingQueryBuilder whereIsConfirmed($value)
     * @method _TicketableBookingQueryBuilder whereIsAttended($value)
     * @method _TicketableBookingQueryBuilder whereNotes($value)
     * @method _TicketableBookingQueryBuilder whereCreatedAt($value)
     * @method _TicketableBookingQueryBuilder whereUpdatedAt($value)
     * @method _TicketableBookingQueryBuilder whereDeletedAt($value)
     * @method TicketableBooking create(array $attributes = [])
     * @method _TicketableBookingCollection|TicketableBooking[] cursor()
     * @method TicketableBooking|null find($id, array $columns = ['*'])
     * @method _TicketableBookingCollection|TicketableBooking[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method TicketableBooking findOrFail($id, array $columns = ['*'])
     * @method _TicketableBookingCollection|TicketableBooking[] findOrNew($id, array $columns = ['*'])
     * @method TicketableBooking first(array|string $columns = ['*'])
     * @method TicketableBooking firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method TicketableBooking firstOrCreate(array $attributes, array $values = [])
     * @method TicketableBooking firstOrFail(array $columns = ['*'])
     * @method TicketableBooking firstOrNew(array $attributes = [], array $values = [])
     * @method TicketableBooking firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method TicketableBooking forceCreate(array $attributes)
     * @method _TicketableBookingCollection|TicketableBooking[] fromQuery(string $query, array $bindings = [])
     * @method _TicketableBookingCollection|TicketableBooking[] get(array|string $columns = ['*'])
     * @method TicketableBooking getModel()
     * @method TicketableBooking[] getModels(array|string $columns = ['*'])
     * @method _TicketableBookingCollection|TicketableBooking[] hydrate(array $items)
     * @method TicketableBooking make(array $attributes = [])
     * @method TicketableBooking newModelInstance(array $attributes = [])
     * @method TicketableBooking updateOrCreate(array $attributes, array $values = [])
     */
    class _TicketableBookingQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method TicketableTicket shift()
     * @method TicketableTicket pop()
     * @method TicketableTicket get($key, $default = null)
     * @method TicketableTicket pull($key, $default = null)
     * @method TicketableTicket first(callable $callback = null, $default = null)
     * @method TicketableTicket firstWhere(string $key, $operator = null, $value = null)
     * @method TicketableTicket[] all()
     * @method TicketableTicket last(callable $callback = null, $default = null)
     */
    class _TicketableTicketCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return TicketableTicket[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _TicketableTicketQueryBuilder whereId($value)
     * @method _TicketableTicketQueryBuilder whereTicketableType($value)
     * @method _TicketableTicketQueryBuilder whereTicketableId($value)
     * @method _TicketableTicketQueryBuilder whereSlug($value)
     * @method _TicketableTicketQueryBuilder whereName($value)
     * @method _TicketableTicketQueryBuilder whereDescription($value)
     * @method _TicketableTicketQueryBuilder whereIsActive($value)
     * @method _TicketableTicketQueryBuilder wherePrice($value)
     * @method _TicketableTicketQueryBuilder whereCurrency($value)
     * @method _TicketableTicketQueryBuilder whereQuantity($value)
     * @method _TicketableTicketQueryBuilder whereSortOrder($value)
     * @method _TicketableTicketQueryBuilder whereCreatedAt($value)
     * @method _TicketableTicketQueryBuilder whereUpdatedAt($value)
     * @method _TicketableTicketQueryBuilder whereDeletedAt($value)
     * @method TicketableTicket create(array $attributes = [])
     * @method _TicketableTicketCollection|TicketableTicket[] cursor()
     * @method TicketableTicket|null find($id, array $columns = ['*'])
     * @method _TicketableTicketCollection|TicketableTicket[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method TicketableTicket findOrFail($id, array $columns = ['*'])
     * @method _TicketableTicketCollection|TicketableTicket[] findOrNew($id, array $columns = ['*'])
     * @method TicketableTicket first(array|string $columns = ['*'])
     * @method TicketableTicket firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method TicketableTicket firstOrCreate(array $attributes, array $values = [])
     * @method TicketableTicket firstOrFail(array $columns = ['*'])
     * @method TicketableTicket firstOrNew(array $attributes = [], array $values = [])
     * @method TicketableTicket firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method TicketableTicket forceCreate(array $attributes)
     * @method _TicketableTicketCollection|TicketableTicket[] fromQuery(string $query, array $bindings = [])
     * @method _TicketableTicketCollection|TicketableTicket[] get(array|string $columns = ['*'])
     * @method TicketableTicket getModel()
     * @method TicketableTicket[] getModels(array|string $columns = ['*'])
     * @method _TicketableTicketCollection|TicketableTicket[] hydrate(array $items)
     * @method TicketableTicket make(array $attributes = [])
     * @method TicketableTicket newModelInstance(array $attributes = [])
     * @method TicketableTicket updateOrCreate(array $attributes, array $values = [])
     */
    class _TicketableTicketQueryBuilder extends _BaseBuilder
    {
    }
}

namespace LaravelIdea\Helper\Spatie\EloquentSortable\Test {

    use Illuminate\Contracts\Support\Arrayable;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;
    use Spatie\EloquentSortable\Test\Dummy;
    use Spatie\EloquentSortable\Test\DummyWithSoftDeletes;

    /**
     * @method Dummy shift()
     * @method Dummy pop()
     * @method Dummy get($key, $default = null)
     * @method Dummy pull($key, $default = null)
     * @method Dummy first(callable $callback = null, $default = null)
     * @method Dummy firstWhere(string $key, $operator = null, $value = null)
     * @method Dummy[] all()
     * @method Dummy last(callable $callback = null, $default = null)
     */
    class _DummyCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Dummy[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method Dummy create(array $attributes = [])
     * @method _DummyCollection|Dummy[] cursor()
     * @method Dummy|null find($id, array $columns = ['*'])
     * @method _DummyCollection|Dummy[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Dummy findOrFail($id, array $columns = ['*'])
     * @method _DummyCollection|Dummy[] findOrNew($id, array $columns = ['*'])
     * @method Dummy first(array|string $columns = ['*'])
     * @method Dummy firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Dummy firstOrCreate(array $attributes, array $values = [])
     * @method Dummy firstOrFail(array $columns = ['*'])
     * @method Dummy firstOrNew(array $attributes = [], array $values = [])
     * @method Dummy firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Dummy forceCreate(array $attributes)
     * @method _DummyCollection|Dummy[] fromQuery(string $query, array $bindings = [])
     * @method _DummyCollection|Dummy[] get(array|string $columns = ['*'])
     * @method Dummy getModel()
     * @method Dummy[] getModels(array|string $columns = ['*'])
     * @method _DummyCollection|Dummy[] hydrate(array $items)
     * @method Dummy make(array $attributes = [])
     * @method Dummy newModelInstance(array $attributes = [])
     * @method Dummy updateOrCreate(array $attributes, array $values = [])
     */
    class _DummyQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method DummyWithSoftDeletes shift()
     * @method DummyWithSoftDeletes pop()
     * @method DummyWithSoftDeletes get($key, $default = null)
     * @method DummyWithSoftDeletes pull($key, $default = null)
     * @method DummyWithSoftDeletes first(callable $callback = null, $default = null)
     * @method DummyWithSoftDeletes firstWhere(string $key, $operator = null, $value = null)
     * @method DummyWithSoftDeletes[] all()
     * @method DummyWithSoftDeletes last(callable $callback = null, $default = null)
     */
    class _DummyWithSoftDeletesCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return DummyWithSoftDeletes[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method DummyWithSoftDeletes create(array $attributes = [])
     * @method _DummyWithSoftDeletesCollection|DummyWithSoftDeletes[] cursor()
     * @method DummyWithSoftDeletes|null find($id, array $columns = ['*'])
     * @method _DummyWithSoftDeletesCollection|DummyWithSoftDeletes[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method DummyWithSoftDeletes findOrFail($id, array $columns = ['*'])
     * @method _DummyWithSoftDeletesCollection|DummyWithSoftDeletes[] findOrNew($id, array $columns = ['*'])
     * @method DummyWithSoftDeletes first(array|string $columns = ['*'])
     * @method DummyWithSoftDeletes firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method DummyWithSoftDeletes firstOrCreate(array $attributes, array $values = [])
     * @method DummyWithSoftDeletes firstOrFail(array $columns = ['*'])
     * @method DummyWithSoftDeletes firstOrNew(array $attributes = [], array $values = [])
     * @method DummyWithSoftDeletes firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method DummyWithSoftDeletes forceCreate(array $attributes)
     * @method _DummyWithSoftDeletesCollection|DummyWithSoftDeletes[] fromQuery(string $query, array $bindings = [])
     * @method _DummyWithSoftDeletesCollection|DummyWithSoftDeletes[] get(array|string $columns = ['*'])
     * @method DummyWithSoftDeletes getModel()
     * @method DummyWithSoftDeletes[] getModels(array|string $columns = ['*'])
     * @method _DummyWithSoftDeletesCollection|DummyWithSoftDeletes[] hydrate(array $items)
     * @method DummyWithSoftDeletes make(array $attributes = [])
     * @method DummyWithSoftDeletes newModelInstance(array $attributes = [])
     * @method DummyWithSoftDeletes updateOrCreate(array $attributes, array $values = [])
     * @method _DummyWithSoftDeletesQueryBuilder withTrashed()
     * @method _DummyWithSoftDeletesQueryBuilder onlyTrashed()
     * @method _DummyWithSoftDeletesQueryBuilder withoutTrashed()
     */
    class _DummyWithSoftDeletesQueryBuilder extends _BaseBuilder
    {
    }
}

namespace LaravelIdea\Helper\Spatie\Permission\Models {

    use Illuminate\Contracts\Support\Arrayable;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    /**
     * @method Permission shift()
     * @method Permission pop()
     * @method Permission get($key, $default = null)
     * @method Permission pull($key, $default = null)
     * @method Permission first(callable $callback = null, $default = null)
     * @method Permission firstWhere(string $key, $operator = null, $value = null)
     * @method Permission[] all()
     * @method Permission last(callable $callback = null, $default = null)
     */
    class _PermissionCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Permission[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _PermissionQueryBuilder whereId($value)
     * @method _PermissionQueryBuilder whereName($value)
     * @method _PermissionQueryBuilder whereGuardName($value)
     * @method _PermissionQueryBuilder whereCreatedAt($value)
     * @method _PermissionQueryBuilder whereUpdatedAt($value)
     * @method Permission create(array $attributes = [])
     * @method _PermissionCollection|Permission[] cursor()
     * @method Permission|null find($id, array $columns = ['*'])
     * @method _PermissionCollection|Permission[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Permission findOrFail($id, array $columns = ['*'])
     * @method _PermissionCollection|Permission[] findOrNew($id, array $columns = ['*'])
     * @method Permission first(array|string $columns = ['*'])
     * @method Permission firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Permission firstOrCreate(array $attributes, array $values = [])
     * @method Permission firstOrFail(array $columns = ['*'])
     * @method Permission firstOrNew(array $attributes = [], array $values = [])
     * @method Permission firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Permission forceCreate(array $attributes)
     * @method _PermissionCollection|Permission[] fromQuery(string $query, array $bindings = [])
     * @method _PermissionCollection|Permission[] get(array|string $columns = ['*'])
     * @method Permission getModel()
     * @method Permission[] getModels(array|string $columns = ['*'])
     * @method _PermissionCollection|Permission[] hydrate(array $items)
     * @method Permission make(array $attributes = [])
     * @method Permission newModelInstance(array $attributes = [])
     * @method Permission updateOrCreate(array $attributes, array $values = [])
     */
    class _PermissionQueryBuilder extends _BaseBuilder
    {
    }

    /**
     * @method Role shift()
     * @method Role pop()
     * @method Role get($key, $default = null)
     * @method Role pull($key, $default = null)
     * @method Role first(callable $callback = null, $default = null)
     * @method Role firstWhere(string $key, $operator = null, $value = null)
     * @method Role[] all()
     * @method Role last(callable $callback = null, $default = null)
     */
    class _RoleCollection extends _BaseCollection
    {
        /**
         * @param int $size
         * @return Role[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _RoleQueryBuilder whereId($value)
     * @method _RoleQueryBuilder whereName($value)
     * @method _RoleQueryBuilder whereGuardName($value)
     * @method _RoleQueryBuilder whereCreatedAt($value)
     * @method _RoleQueryBuilder whereUpdatedAt($value)
     * @method Role create(array $attributes = [])
     * @method _RoleCollection|Role[] cursor()
     * @method Role|null find($id, array $columns = ['*'])
     * @method _RoleCollection|Role[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Role findOrFail($id, array $columns = ['*'])
     * @method _RoleCollection|Role[] findOrNew($id, array $columns = ['*'])
     * @method Role first(array|string $columns = ['*'])
     * @method Role firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Role firstOrCreate(array $attributes, array $values = [])
     * @method Role firstOrFail(array $columns = ['*'])
     * @method Role firstOrNew(array $attributes = [], array $values = [])
     * @method Role firstWhere(array|\Closure|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Role forceCreate(array $attributes)
     * @method _RoleCollection|Role[] fromQuery(string $query, array $bindings = [])
     * @method _RoleCollection|Role[] get(array|string $columns = ['*'])
     * @method Role getModel()
     * @method Role[] getModels(array|string $columns = ['*'])
     * @method _RoleCollection|Role[] hydrate(array $items)
     * @method Role make(array $attributes = [])
     * @method Role newModelInstance(array $attributes = [])
     * @method Role updateOrCreate(array $attributes, array $values = [])
     */
    class _RoleQueryBuilder extends _BaseBuilder
    {
    }
}

namespace Rinvex\Bookings\Models {

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\Rinvex\Bookings\Models\_TicketableBookingCollection;
    use LaravelIdea\Helper\Rinvex\Bookings\Models\_TicketableBookingQueryBuilder;
    use LaravelIdea\Helper\Rinvex\Bookings\Models\_TicketableTicketCollection;
    use LaravelIdea\Helper\Rinvex\Bookings\Models\_TicketableTicketQueryBuilder;

    /**
     * @property int $id
     * @property int $ticket_id
     * @property int $customer_id
     * @property float $paid
     * @property string|null $currency
     * @property bool $is_approved
     * @property bool $is_confirmed
     * @property bool $is_attended
     * @property string|null $notes
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @method _TicketableBookingQueryBuilder newModelQuery()
     * @method _TicketableBookingQueryBuilder newQuery()
     * @method static _TicketableBookingQueryBuilder query()
     * @method static _TicketableBookingCollection|TicketableBooking[] all()
     * @mixin _TicketableBookingQueryBuilder
     */
    class TicketableBooking extends Model
    {
    }

    /**
     * @property int $id
     * @property string $ticketable_type
     * @property int $ticketable_id
     * @property string $slug
     * @property string $name
     * @property string|null $description
     * @property bool $is_active
     * @property float $price
     * @property string|null $currency
     * @property int|null $quantity
     * @property int $sort_order
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @method _TicketableTicketQueryBuilder newModelQuery()
     * @method _TicketableTicketQueryBuilder newQuery()
     * @method static _TicketableTicketQueryBuilder query()
     * @method static _TicketableTicketCollection|TicketableTicket[] all()
     * @mixin _TicketableTicketQueryBuilder
     */
    class TicketableTicket extends Model
    {
    }
}

namespace Spatie\EloquentSortable\Test {

    use Illuminate\Database\Eloquent\Model;
    use LaravelIdea\Helper\Spatie\EloquentSortable\Test\_DummyCollection;
    use LaravelIdea\Helper\Spatie\EloquentSortable\Test\_DummyQueryBuilder;
    use LaravelIdea\Helper\Spatie\EloquentSortable\Test\_DummyWithSoftDeletesCollection;
    use LaravelIdea\Helper\Spatie\EloquentSortable\Test\_DummyWithSoftDeletesQueryBuilder;

    /**
     * @method _DummyQueryBuilder newModelQuery()
     * @method _DummyQueryBuilder newQuery()
     * @method static _DummyQueryBuilder query()
     * @method static _DummyCollection|Dummy[] all()
     * @mixin _DummyQueryBuilder
     */
    class Dummy extends Model
    {
    }

    /**
     * @method _DummyWithSoftDeletesQueryBuilder newModelQuery()
     * @method _DummyWithSoftDeletesQueryBuilder newQuery()
     * @method static _DummyWithSoftDeletesQueryBuilder query()
     * @method static _DummyWithSoftDeletesCollection|DummyWithSoftDeletes[] all()
     * @method _DummyWithSoftDeletesQueryBuilder withTrashed()
     * @method _DummyWithSoftDeletesQueryBuilder onlyTrashed()
     * @method _DummyWithSoftDeletesQueryBuilder withoutTrashed()
     * @mixin _DummyWithSoftDeletesQueryBuilder
     */
    class DummyWithSoftDeletes extends Model
    {
    }
}

namespace Spatie\Permission\Models {

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\Spatie\Permission\Models\_PermissionCollection;
    use LaravelIdea\Helper\Spatie\Permission\Models\_PermissionQueryBuilder;
    use LaravelIdea\Helper\Spatie\Permission\Models\_RoleCollection;
    use LaravelIdea\Helper\Spatie\Permission\Models\_RoleQueryBuilder;

    /**
     * @property int $id
     * @property string $name
     * @property string $guard_name
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method _PermissionQueryBuilder newModelQuery()
     * @method _PermissionQueryBuilder newQuery()
     * @method static _PermissionQueryBuilder query()
     * @method static _PermissionCollection|Permission[] all()
     * @mixin _PermissionQueryBuilder
     */
    class Permission extends Model
    {
    }

    /**
     * @property int $id
     * @property string $name
     * @property string $guard_name
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method _RoleQueryBuilder newModelQuery()
     * @method _RoleQueryBuilder newQuery()
     * @method static _RoleQueryBuilder query()
     * @method static _RoleCollection|Role[] all()
     * @mixin _RoleQueryBuilder
     */
    class Role extends Model
    {
    }
}
